<?php 
namespace App\Exports;

use App\PayrollDetails;
use App\Bank;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BankStatementExport implements FromQuery, WithHeadings
{
    use Exportable;

    public function __construct($bank,$month)
    {
        $this->bank = $bank;
        $this->month = $month;
    }

    public function query()
    {

    	$exceldata = PayrollDetails::query()
    		->join('employee','payroll_details.employee_id','=','employee.emp_code')
    		->join('bank','employee.emp_bank_name','=','bank.bank_name')
            ->where(['payroll_details.month_yr'=>$this->month,'employee.emp_bank_name'=>$this->bank])
            ->select('payroll_details.employee_id','payroll_details.emp_name','payroll_details.emp_designation','bank.bank_name','bank.ifsc_code','employee.emp_account_no','payroll_details.emp_net_salary');

        return $exceldata;
    }
    public function headings(): array {
        return [
            'Employee Id',
            'Employee Name',
            'Designation',
            "Bank Name",
            "IFSC Code",
            "Account No.",
            "Net Pay"
            
        ];
    }
    
}
