<?php
namespace App\Repository;
interface TeacherReposiitoryInterface{
    public  function getAllTeachers();
    public  function storeTachers($request);
    public  function getSpecialization();
    public  function getGender();
    public  function updateTacher($request);
    public  function editTacher($id);
    public  function deleteTacher($request);
}
