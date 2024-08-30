        <!--=================================
 header start-->
        <nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <!-- logo -->
            <div class="text-left navbar-brand-wrapper">
                <a class="navbar-brand brand-logo" href="index.html"><img src="{{ asset('assets/images/logo-dark.png') }}"
                        alt=""></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('assets/images/logo-icon-dark.png') }}"
                        alt=""></a>
            </div>
            <!-- Top bar left -->
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item">
                    <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left"
                        href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
                </li>
                <li class="nav-item">
                    <div class="search">
                        <a class="search-btn not_click" href="javascript:void(0);"></a>
                        <div class="search-box not-click">
                            <input type="text" class="not-click form-control" placeholder="Search" value=""
                                name="search">
                            <button class="search-button" type="submit"> <i
                                    class="fa fa-search not-click"></i></button>
                        </div>
                    </div>
                </li>
            </ul>
            <!-- top bar right -->
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item fullscreen">
                        <a onclick="location.reload();" class="nav-link" style="margin-top:10px;cursor: pointer;"><i class="fas fa-sync-alt"></i></i></a>
                        {{-- <a href="#" onclick="location.reload();" style="margin-top: 10px;">
                            <svg fill="#000000" height="30px" width="40px" version="1.1" id="Capa_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                viewBox="0 0 53 53" xml:space="preserve">
                                <g>
                                    <path d="M37.467,46.633c-0.591,0.226-1.2,0.427-1.811,0.597c-0.531,0.147-0.843,0.699-0.694,1.231
                                            c0.123,0.442,0.524,0.731,0.962,0.731c0.089,0,0.18-0.012,0.27-0.037c0.669-0.186,1.338-0.406,1.986-0.653
                                            c0.517-0.197,0.774-0.775,0.578-1.291C38.561,46.695,37.979,46.437,37.467,46.633z" />
                                                                            <path d="M42.475,43.894c-0.508,0.376-1.04,0.734-1.583,1.064c-0.472,0.287-0.622,0.902-0.335,1.374
                                            c0.188,0.31,0.518,0.48,0.855,0.48c0.177,0,0.356-0.047,0.519-0.146c0.595-0.361,1.179-0.754,1.735-1.166
                                            c0.443-0.329,0.536-0.955,0.208-1.399C43.545,43.658,42.921,43.564,42.475,43.894z" />
                                                                            <path d="M31.906,47.914C31.278,47.971,30.637,48,30,48c-0.553,0-1,0.447-1,1s0.447,1,1,1c0.697,0,1.398-0.031,2.086-0.094
                                            c0.551-0.05,0.956-0.536,0.906-1.086S32.448,47.855,31.906,47.914z" />
                                                                            <path d="M50.738,34.43c-0.509-0.211-1.095,0.033-1.305,0.545c-0.241,0.587-0.512,1.169-0.805,1.729
                                            c-0.255,0.489-0.065,1.094,0.424,1.35c0.147,0.077,0.306,0.113,0.462,0.113c0.36,0,0.709-0.195,0.888-0.537
                                            c0.32-0.613,0.617-1.251,0.881-1.895C51.493,35.224,51.249,34.64,50.738,34.43z" />
                                                                            <path d="M51.969,28.572c-0.539-0.069-1.045,0.329-1.109,0.877c-0.074,0.632-0.178,1.266-0.307,1.884
                                            c-0.113,0.54,0.232,1.07,0.773,1.184c0.069,0.015,0.138,0.021,0.206,0.021c0.463,0,0.879-0.323,0.978-0.795
                                            c0.142-0.677,0.255-1.37,0.336-2.062C52.91,29.133,52.518,28.637,51.969,28.572z" />
                                                                            <path d="M46.565,39.909c-0.392,0.501-0.809,0.988-1.241,1.45c-0.378,0.402-0.357,1.035,0.046,1.413
                                            c0.192,0.181,0.438,0.271,0.684,0.271c0.267,0,0.532-0.106,0.729-0.316c0.474-0.504,0.931-1.038,1.358-1.587
                                            c0.34-0.436,0.263-1.063-0.173-1.403C47.532,39.396,46.904,39.474,46.565,39.909z" />
                                                                            <path d="M52,27c0.553,0,1-0.447,1-1C53,13.317,42.683,3,30,3C18.093,3,8.272,12.094,7.115,23.701l-5.408-5.408
                                            c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414l6.999,6.999c0.092,0.093,0.203,0.166,0.326,0.217
                                            C7.74,26.974,7.87,27,8,27s0.26-0.026,0.382-0.077c0.123-0.051,0.234-0.124,0.326-0.217l6.999-6.999
                                            c0.391-0.391,0.391-1.023,0-1.414s-1.023-0.391-1.414,0l-5.116,5.116C10.46,13.05,19.3,5,30,5c11.579,0,21,9.421,21,21
                                            C51,26.553,51.447,27,52,27z" />
                                </g>
                            </svg>
                        </a> --}}

                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="ti-bell"></i>
                        <span class="badge badge-danger notification-status"> </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
                        <div class="dropdown-header notifications">
                            <strong>Notifications</strong>
                            <span class="badge badge-pill badge-warning">05</span>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">New registered user <small
                                class="float-right text-muted time">Just now</small> </a>
                        <a href="#" class="dropdown-item">New invoice received <small
                                class="float-right text-muted time">22 mins</small> </a>
                        <a href="#" class="dropdown-item">Server error report<small
                                class="float-right text-muted time">7 hrs</small> </a>
                        <a href="#" class="dropdown-item">Database report<small
                                class="float-right text-muted time">1
                                days</small> </a>
                        <a href="#" class="dropdown-item">Order confirmation<small
                                class="float-right text-muted time">2
                                days</small> </a>
                    </div>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="true"> <i class=" ti-view-grid"></i> </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-big">
                        <div class="dropdown-header">
                            <strong>Quick Links</strong>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="nav-grid">
                            <a href="#" class="nav-grid-item"><i class="ti-files text-primary"></i>
                                <h5>New Task</h5>
                            </a>
                            <a href="#" class="nav-grid-item"><i class="ti-check-box text-success"></i>
                                <h5>Assign Task</h5>
                            </a>
                        </div>
                        <div class="nav-grid">
                            <a href="#" class="nav-grid-item"><i class="ti-pencil-alt text-warning"></i>
                                <h5>Add Orders</h5>
                            </a>
                            <a href="#" class="nav-grid-item"><i class="ti-truck text-danger "></i>
                                <h5>New Orders</h5>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown mr-30">
                    <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('assets/images/profile-avatar.jpg') }}" alt="avatar">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header">
                            <div class="media">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-0">Michael Bean</h5>
                                    <span>michael-bean@mail.com</span>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i class="text-secondary ti-reload"></i>Activity</a>
                        <a class="dropdown-item" href="#"><i class="text-success ti-email"></i>Messages</a>
                        <a class="dropdown-item" href="#"><i class="text-warning ti-user"></i>Profile</a>
                        <a class="dropdown-item" href="#"><i class="text-dark ti-layers-alt"></i>Projects <span
                                class="badge badge-info">6</span> </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i class="text-info ti-settings"></i>Settings</a>
                        <a class="dropdown-item" href="#"><i class="text-danger ti-unlock"></i>Logout</a>
                    </div>
                </li>
            </ul>
        </nav>

        <!--=================================
 header End-->
