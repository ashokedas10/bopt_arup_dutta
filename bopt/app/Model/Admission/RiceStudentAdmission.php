<?php

namespace App\Model\Admission;

use Illuminate\Database\Eloquent\Model;

class RiceStudentAdmission extends Model
{
	protected $table="student_admission_rice";
	protected $primaryKey="id";
	protected $fillable=['id', 'institute_code', 'faculty_code', 'course_code', 'session', 'application_dt', 'application_no', 'enrollment_no', 'application_type', 'first_name', 'middle_name', 'last_name', 'email', 'contact_no', 'alternative_contact', 'dob', 'gender', 'blood_group', 'mothers_tounge', 'marital_status', 'caste', 'nationality', 'religion', 'fee_type', 'passport_photo', 'mothers_name', 'mothers_qualification', 'mothers_occuption', 'mothers_address', 'mothers_office_ph_no', 'mothers_designation', 'mothers_nature_of_business', 'mothers_monthly_income', 'fathers_name', 'fathers_qualification', 'fathers_occuption', 'fathers_office_address', 'fathers_office_contact_no', 'fathers_designation', 'fathers_nature_of_business', 'fathers_annual_income', 'gurdian_name', 'relation_with_gurdian', 'gurdian_address', 'gurdian_contact_no', 'present_street_no_name', 'present_city', 'present_state', 'present_country', 'present_pin_code', 'permanent_street_no_name', 'permanent_city', 'permanent_state', 'permanent_country', 'permanent_pin_code', 'x_board_university', 'x_passing_year', 'x_division', 'x_subject', 'x_tot_marks', 'x_marks_obtained', 'x_marksheet', 'xii_board_university', 'xii_passing_year', 'xii_division', 'xii_subject', 'xii_tot_marks', 'xii_marks_obtained', 'xii_marksheet', 'graduation_board_university', 'graduation_passing_year', 'graduation_division', 'graduation_subject', 'graduation_tot_marks', 'graduation_marks_obtained', 'graduation_marksheet', 'post_graduation_board_university', 'post_graduation_passing_year', 'post_graduation_division', 'post_graduation_subject', 'post_graduation_tot_marks', 'post_graduation_marks_obtained', 'post_graduation_marksheet', 'current_education_status', 'graduation_status', 'post_graduation_status', 'industry_type', 'it_skills', 'work_experience', 'role', 'salary', 'refer_name', 'refer_contact_no', 'refer_address', 'front_office_ambience', 'brochure_avail', 'queries', 'rice_products', 'created_at', 'updated_at'];
}
