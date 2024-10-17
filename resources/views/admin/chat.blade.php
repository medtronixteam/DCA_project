@extends('layouts.admin')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ url('admin/assets/css/font-awesome-n.min.css') }}">
    <link rel="stylesheet" href="{{ url('admin/assets/css/animation.css') }}">
    <link rel="stylesheet" href="{{ url('admin/assets/css/widget.css') }}">
    <link rel="stylesheet" href="{{ url('admin/assets/css/chatbox.css') }}">
    <div class="pcoded-content">

        <div class="page-header card">
        </div>

        <div class="pcoded-inner-co
                <!-- Main content -->
                <div class="flex-grow-1">
                    <!-- Header -->
                    <div class="chat-header bg-light px-4 py-3">
                        <h4 class="fw-bold">Chat</h4>
                    </div>
                    <button class="menu-btn btn btn-primary d-lg-none d-md-none" onclick="toggleNav()">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="d-flex justify-content-between">
                        <div class="side_menu nav flex-column nav-pills me-3 col-8 col-sm-6 col-md-3 col-lg-3"
                            id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="close-btn btn btn-primary d-lg-none d-md-none" onclick="toggleNav()">
                                <i class="fas fa-times"></i>
                            </button>
                            <button class="border-0" id="v-pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                                aria-selected="true">
                                <div class="chat-item">
                                    <img src="{{ url('admin/assets/images/chatbox-img/download1.jpg') }}" alt="User" />
                                    <div>
                                        <h6 class="mb-0">Nancy Fernandez</h6>
                                        <small>Hi Jordan! Feels like...</small>
                                    </div>
                                </div>
                            </button>
                            <button class="nav-link p-0" id="v-pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-profile" type="button" role="tab"
                                aria-controls="v-pills-profile" aria-selected="false">
                                <div class="chat-item">
                                    <img src="{{ url('admin/assets/images/chatbox-img/images (1).jpg') }}" alt="User" />
                                    <div>
                                        <h6 class="mb-0">Jonathan Griffin</h6>
                                        <small>Super! I will...</small>
                                    </div>
                                </div>
                            </button>
                            <button class="nav-link p-0" id="v-pills-messages-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-messages" type="button" role="tab"
                                aria-controls="v-pills-messages" aria-selected="false">
                                <div class="chat-item">
                                    <img src="{{ url('admin/assets/images/chatbox-img/images (2).jpg') }}" alt="User" />
                                    <div>
                                        <h6 class="mb-0">Jonathan Griffin</h6>
                                        <small>Super! I will...</small>
                                    </div>
                                </div>
                            </button>
                            <button class="nav-link p-0" id="v-pills-settings-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-settings" type="button" role="tab"
                                aria-controls="v-pills-settings" aria-selected="false">
                                <div class="chat-item">
                                    <img src="{{ url('admin/assets/images/chatbox-img/images.jpg') }}" alt="User" />
                                    <div>
                                        <h6 class="mb-0">Getrude Webwer</h6>
                                        <small>Living in now use...</small>
                                    </div>
                                </div>
                            </button>
                        </div>
                        <div class="tab-content col-11 col-lg-12 col-sm-12" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                aria-labelledby="v-pills-home-tab" tabindex="0">
                                <div class="row border-bottom">
                                    <div class="col">
                                        <div class="user-profile">
                                            <div class="chat-item border-0">
                                                <img src="{{ url('admin/assets/images/chatbox-img/download1.jpg') }}"
                                                    alt="User" />
                                                <div>
                                                    <h6 class="mb-0">Nancy Fernandez</h6>
                                                    <small>Online</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-content col-lg-9 col-md-9 col-sm-12">
                                    <div class="message d-flex" id="messageContent">
                                        <img src="{{ url('admin/assets/images/chatbox-img/download1.jpg') }}"
                                            alt="User" />
                                        <p>Hi Jordan! Feels like it's been a while. How are you?</p>
                                    </div>
                                    <div class="message sent d-flex">
                                        <p>
                                            Hi Nancy, glad to hear from you. I'm doing well, thank you!
                                        </p>
                                        <img src="{{ url('admin/assets/images/chatbox-img/images (1).jpg') }}"
                                            alt="" />
                                    </div>
                                    <div class="message d-flex" id="messageContent">
                                        <img src="{{ url('admin/assets/images/chatbox-img/download1.jpg') }}"
                                            alt="User" />
                                        <p>abc</p>
                                    </div>
                                    <div class="message sent d-flex">
                                        <p>xyz</p>
                                        <img src="{{ url('admin/assets/images/chatbox-img/images (1).jpg') }}"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="chat-input">
                                    <input type="text" placeholder="Write your message ..." />
                                    <button class="send-btn">
                                        <i class="fa-sharp-duotone fa-solid fa-paper-plane fa-fw"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                aria-labelledby="v-pills-profile-tab" tabindex="0">
                                <div class="row border-bottom">
                                    <div class="col">
                                        <div class="user-profile">
                                            <div class="chat-item border-0">
                                                <img src="{{ url('admin/assets/images/chatbox-img/images (1).jpg') }}"
                                                    alt="User" />
                                                <div>
                                                    <h6 class="mb-0">Jonathan Griffin</h6>
                                                    <small>Online</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-content col-lg-9 col-md-9 col-sm-12">
                                    <div class="message d-flex" id="messageContent">
                                        <img src="{{ url('admin/assets/images/chatbox-img/download1.jpg') }}"
                                            alt="User" />
                                        <p>Containers are the most basic layout element in Bootstrap and are required when
                                            using our default grid system. Containers</p>
                                    </div>
                                    <div class="message sent d-flex">
                                        <p>Containers are the most basic layout element contain, pad, and (sometimes) center
                                            the content within them. While containers can be nested, most layouts do not
                                            require a nested container.</p>
                                        <img src="{{ url('admin/assets/images/chatbox-img/images (1).jpg') }}"
                                            alt="" />
                                    </div>
                                    <div class="message d-flex" id="messageContent">
                                        <img src="{{ url('admin/assets/images/chatbox-img/download1.jpg') }}"
                                            alt="User" />
                                        <p>abc</p>
                                    </div>
                                    <div class="message sent d-flex">
                                        <p>xyz</p>
                                        <img src="{{ url('admin/assets/images/chatbox-img/images (1).jpg') }}"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="chat-input">
                                    <input type="text" placeholder="Write your message ..." />
                                    <button class="send-btn">
                                        <i class="fa-sharp-duotone fa-solid fa-paper-plane fa-fw"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                aria-labelledby="v-pills-messages-tab" tabindex="0">
                                <div class="row border-bottom">
                                    <div class="col">
                                        <div class="user-profile">
                                            <div class="chat-item border-0">
                                                <img src="{{ url('admin/assets/images/chatbox-img/images (1).jpg') }}"
                                                    alt="User" />
                                                <div>
                                                    <h6 class="mb-0">Jonathan Griffin</h6>
                                                    <small>Online</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-content col-lg-9 col-md-9 col-sm-12">
                                    <div class="message d-flex" id="messageContent">
                                        <img src="{{ url('admin/assets/images/chatbox-img/download1.jpg') }}"
                                            alt="User" />
                                        <p>sfasdfgsdfgsd</p>
                                    </div>
                                    <div class="message sent d-flex">
                                        <p>svdfhgk,jh</p>
                                        <img src="{{ url('admin/assets/images/chatbox-img/download1.jpg') }}"
                                            alt="" />
                                    </div>
                                    <div class="message d-flex" id="messageContent">
                                        <img src="{{ url('admin/assets/images/chatbox-img/download1.jpg') }}"
                                            alt="User" />
                                        <p>abc</p>
                                    </div>
                                    <div class="message sent d-flex">
                                        <p>xyz</p>
                                        <img src="{{ url('admin/assets/images/chatbox-img/images (1).jpg') }}"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="chat-input">
                                    <input type="text" placeholder="Write your message ..." />
                                    <button class="send-btn">
                                        <i class="fa-sharp-duotone fa-solid fa-paper-plane fa-fw"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                aria-labelledby="v-pills-settings-tab" tabindex="0">
                                <div class="row border-bottom">
                                    <div class="col">
                                        <div class="user-profile">
                                            <div class="chat-item border-0">
                                                <img src="{{ url('admin/assets/images/chatbox-img/images (1).jpg') }}"
                                                    alt="User" />
                                                <div>
                                                    <h6 class="mb-0">Jonathan Griffin</h6>
                                                    <small>Online</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-content col-lg-9 col-md-9 col-sm-12">
                                    <div class="message d-flex" id="messageContent">
                                        <img src="{{ url('admin/assets/images/chatbox-img/download1.jpg') }}"
                                            alt="User" />
                                        <p>sfasdfgsdfgsd</p>
                                    </div>
                                    <div class="message sent d-flex">
                                        <p>svdfhgk,jh</p>
                                        <img src="{{ url('admin/assets/images/chatbox-img/images (1).jpg') }}"
                                            alt="" />
                                    </div>
                                    <div class="message d-flex" id="messageContent">
                                        <img src="{{ url('admin/assets/images/chatbox-img/download1.jpg') }}"
                                            alt="User" />
                                        <p>abc</p>
                                    </div>
                                    <div class="message sent d-flex">
                                        <p>xyz</p>
                                        <img src="{{ url('admin/assets/images/chatbox-img/images (1).jpg') }}"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="chat-input">
                                    <input type="text" placeholder="Write your message ..." />
                                    <button class="send-btn">
                                        <i class="fa-sharp-duotone fa-solid fa-paper-plane fa-fw"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        const nav = document.querySelector('.side_menu');

        function toggleNav() {
            if (nav.style.left === '0px') {
                nav.style.left = '-500px';
            } else {
                nav.style.left = '0';
            }
            console.log("btn was clicked");
        }
    </script>
@endsection
