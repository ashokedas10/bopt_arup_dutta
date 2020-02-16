<?php

namespace App\Model\Admission;

use Illuminate\Database\Eloquent\Model;

class UniversityStudentAdmission extends Model
{
	protected $table="student_admission_university";
	protected $primaryKey="id";
	protected $fillable=[ 'id', 'institute_code', 'faculty_code', 'course_code', 'session', 'application_dt', 'application_no', 'enrollment_no', 'application_type', 'first_name', 'middle_name', 'last_name', 'email', 'contact_no', 'alternative_contact', 'dob', 'gender', 'blood_group', 'marital_status', 'adhaar_no', 'caste', 'nationality', 'religion', 'passport', 'authority', 'valid_frm', 'valid_to', 'wbjee_candidate', 'physically_chalanged', 'per_of_disability', 'passport_photo', 'signature', 'adhaar_card', 'voter_card', 'caste_certificate', 'physically_challenged_certificate', 'source', 'meet_with_counselor', 'counselor_name', 'mothers_name', 'mothers_qualification', 'fathers_name', 'fathers_qualification', 'fathers_emailid', 'fathers_contact_no', 'fathers_occuption', 'fathers_annual_income', 'gurdian_name', 'relation_with_gurdian', 'gurdian_qualification', 'gurdian_email', 'gurdian_contact_no', 'gurdian_occuption', 'gurdian_annual_income', 'present_street_no_name', 'present_city', 'present_state', 'present_country', 'present_pin_code', 'permanent_street_no_name', 'permanent_city', 'permanent_state', 'permanent_country', 'permanent_pin_code', 'x_board_university', 'x_passing_year', 'x_division', 'x_subject', 'x_tot_marks', 'x_marks_obtained', 'x_marksheet', 'xii_board_university', 'xii_passing_year', 'xii_division', 'xii_subject', 'xii_tot_marks', 'xii_marks_obtained', 'xii_marksheet', 'graduation_board_university', 'graduation_passing_year', 'graduation_division', 'graduation_subject', 'graduation_tot_marks', 'graduation_marks_obtained', 'graduation_marksheet', 'post_graduation_board_university', 'post_graduation_passing_year', 'post_graduation_division', 'post_graduation_subject', 'post_graduation_tot_marks', 'post_graduation_marks_obtained', 'post_graduation_marksheet'];
}
