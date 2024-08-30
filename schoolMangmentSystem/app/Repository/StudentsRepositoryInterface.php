<?php
namespace App\Repository;
interface StudentsRepositoryInterface{
    public function CreateStudent();
    public function Get_classrooms($id);
    public function Get_Sections($id);
    public function Get_phone($id);
    public function Store_Student($request);
    public function Edit_Student($id);
    public function Update_Student($request);
    public function Delete_Student($request);
    public function Get_Students();
    public function Get_info();

}
