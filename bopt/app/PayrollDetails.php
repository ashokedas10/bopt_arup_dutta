<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayrollDetails extends Model
{
	protected $table='payroll_details';
	protected $primaryKey='id';
	protected $fillable=['id', 'department_id', 'employee_type_id', 'month', 'emp_code', 'emp_name', 'designation', 'basic_sal', 'spa', 'telephone', 'evengseal', 'evengbel', 'offdayclass', 'doubtclear', 'splclass', 'brallow', 'hra', 'wash', 'conv', 'ot', 'basic', 'da', 'xtraduty', 'gradepay', 'medical', 'perform', 'food', 'othallow', 'fixallow', 'cess', 'pf', 'esi', 'ptax', 'itax', 'othded', 'cd_emp', 'cd_bank', 'advance', 'late_amt', 'int_advance', 'foodchg', 'tranchg', 'mantchg', 'othadj', 'saladv', 'gross_salary', 'total_deduction', 'net_salary', 'updated_at', 'created_at'];
}
