<?php

namespace App\Providers;

use App\Models\Student;
use App\Repository\AttendanceRepository;
use App\Repository\AttendanceRepositoryInterface;
use App\Repository\StudentsPromotionRepository;
use App\Repository\StudentsPromotionRepositoryInterface;
use App\Repository\StudentsRepository;
use App\Repository\StudentsRepositoryInterface;
use App\Repository\SubjectRepository;
use App\Repository\SubjectRepositoryInterface;
use App\Repository\TeacherReposiitoryInterface;
use App\Repository\TeacherRepository;
use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(TeacherReposiitoryInterface::class,TeacherRepository::class);
        $this->app->bind(StudentsRepositoryInterface::class,StudentsRepository::class);
        $this->app->bind(StudentsPromotionRepositoryInterface::class,StudentsPromotionRepository::class);
        $this->app->bind(AttendanceRepositoryInterface::class,AttendanceRepository::class);
        $this->app->bind(SubjectRepositoryInterface::class,SubjectRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
