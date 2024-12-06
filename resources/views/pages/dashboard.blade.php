@extends('layout.layout', ['title' => 'Welcome'])

@section('head-content')
    <link rel="stylesheet" href="/css/dashboard.css">
@endsection

@section('body-content')
    <div style="height: 100%; width: 100%;">
        <main style="padding: 0 12px 12px 12px;">
            <h1 class="section-title my-4">Dashboard</h1>
            <section>
                <h2 class="section-title">My Courses</h2>
                <!-- Cards -->
                <div style="display: flex; align-items: center;">
                    <div style="display: flex; overflow-x: scroll; width: 100%;">
                        <div class="course-card">
                            <div class="card-photo">
                                <img class="card-img">
                            </div>
                            <div class="card-text">
                                <div style="margin: auto;">
                                    <b><div>Introductory Statistics</div></b>
                                    <div>STAT 269</div>
                                </div>
                            </div>
                        </div>
                        <div class="course-card">
                            <div class="card-photo">
                                <img class="card-img">
                            </div>
                            <div class="card-text">
                                <div style="margin: auto;">
                                    <b><div>Intermediate Spanish</div></b>
                                    <div>SPAN 201</div>
                                </div>
                            </div>
                        </div>
                        <div class="course-card">
                            <div class="card-photo">
                                <img class="card-img">
                            </div>
                            <div class="card-text">
                                <div style="margin: auto;">
                                    <b><div>Drawing I</div></b>
                                    <div>ART 171</div>
                                </div>
                            </div>
                        </div>
                        <div class="course-card">
                            <div class="card-photo">
                                <img class="card-img">
                            </div>
                            <div class="card-text">
                                <div style="margin: auto;">
                                    <b><div>Programming for User Interaction</div></b>
                                    <div>CIS 281</div>
                                </div>
                            </div>
                        </div>
                        <div class="course-card">
                            <div class="card-photo">
                                <img class="card-img">
                            </div>
                            <div class="card-text">
                                <div style="margin: auto;">
                                    <b><div>Web Development: Server Side</div></b>
                                    <div>CIS 291</div>
                                </div>
                            </div>
                        </div>
                        <div class="course-card">
                            <div class="card-photo">
                                <img class="card-img">
                            </div>
                            <div class="card-text">
                                <div style="margin: auto;">
                                    <b><div>Web Development: Server Side</div></b>
                                    <div>CIS 291</div>
                                </div>
                            </div>
                        </div>
                        <div class="course-card">
                            <div class="card-photo">
                                <img class="card-img">
                            </div>
                            <div class="card-text">
                                <div style="margin: auto;">
                                    <b><div>Web Development: Server Side</div></b>
                                    <div>CIS 291</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <h2 class="section-title mt-4">Starred Resources</h2>
                <!-- Starred Notes -->
                <div style="overflow-x: auto;">
                    <div style="display: flex;">
                        <div class="note-preview">
                            <div class="note-information">
                                <div style="background: white; width: 35px; border-radius: 20px;">
                                    <iron-icon icon="star" style="padding: 5px; color: var(--main-color);"></iron-icon>
                                </div>
                                <div style="padding: 0 12px; display: flex; margin: auto; flex-direction: column;">
                                    <div style="margin-right: 4px;">STAT 269</div>
                                    <div>Chapter 3 Unit 2</div>
                                </div>
                            </div>
                            <img class="note-img" src="https://wiki.theplaz.com/w/images/thumb/American_Studies_Chap_17_-_Reconstruction_-_Politics_of_Reconstruction_Page_1.jpg/300px-American_Studies_Chap_17_-_Reconstruction_-_Politics_of_Reconstruction_Page_1.jpg">
                        </div>
                        <div class="note-preview">
                            <div class="note-information">
                                <div style="background: white; width: 35px; border-radius: 20px;">
                                    <iron-icon icon="star" style="padding: 5px; color: var(--main-color);"></iron-icon>
                                </div>
                                <div style="padding: 0 12px; display: flex; margin: auto;">
                                    <div style="margin-right: 4px;">CIS 281</div>
                                    <div>Chapter 14</div>
                                </div>
                            </div>
                            <img class="note-img" src="https://wiki.theplaz.com/w/images/thumb/American_Studies_Chap_17_-_Reconstruction_-_Politics_of_Reconstruction_Page_1.jpg/300px-American_Studies_Chap_17_-_Reconstruction_-_Politics_of_Reconstruction_Page_1.jpg">
                        </div>
                        <div class="note-preview">
                            <div class="note-information">
                                <div style="background: white; width: 35px; border-radius: 20px;">
                                    <iron-icon icon="star" style="padding: 5px; color: var(--main-color);"></iron-icon>
                                </div>
                                <div style="padding: 0 12px; display: flex; margin: auto;">
                                    <div style="margin-right: 4px;">CIS 281</div>
                                    <div>Chapter 14</div>
                                </div>
                            </div>
                            <img class="note-img" src="https://wiki.theplaz.com/w/images/thumb/American_Studies_Chap_17_-_Reconstruction_-_Politics_of_Reconstruction_Page_1.jpg/300px-American_Studies_Chap_17_-_Reconstruction_-_Politics_of_Reconstruction_Page_1.jpg">
                        </div>
                        <div class="note-preview">
                            <div class="note-information">
                                <div style="background: white; width: 35px; border-radius: 20px;">
                                    <iron-icon icon="star" style="padding: 5px; color: var(--main-color);"></iron-icon>
                                </div>
                                <div style="padding: 0 12px; display: flex; margin: auto;">
                                    <div style="margin-right: 4px;">CIS 281</div>
                                    <div>Chapter 14</div>
                                </div>
                            </div>
                            <img class="note-img" src="https://wiki.theplaz.com/w/images/thumb/American_Studies_Chap_17_-_Reconstruction_-_Politics_of_Reconstruction_Page_1.jpg/300px-American_Studies_Chap_17_-_Reconstruction_-_Politics_of_Reconstruction_Page_1.jpg">
                        </div>
                        <div class="note-preview">
                            <div class="note-information">
                                <div style="background: white; width: 35px; border-radius: 20px;">
                                    <iron-icon icon="star" style="padding: 5px; color: var(--main-color);"></iron-icon>
                                </div>
                                <div style="padding: 0 12px; display: flex; margin: auto;">
                                    <div style="margin-right: 4px;">CIS 281</div>
                                    <div>Chapter 14</div>
                                </div>
                            </div>
                            <img class="note-img" src="https://wiki.theplaz.com/w/images/thumb/American_Studies_Chap_17_-_Reconstruction_-_Politics_of_Reconstruction_Page_1.jpg/300px-American_Studies_Chap_17_-_Reconstruction_-_Politics_of_Reconstruction_Page_1.jpg">
                        </div>
                        <div class="note-preview">
                            <div class="note-information">
                                <div style="background: white; width: 35px; border-radius: 20px;">
                                    <iron-icon icon="star" style="padding: 5px; color: var(--main-color);"></iron-icon>
                                </div>
                                <div style="padding: 0 12px; display: flex; margin: auto;">
                                    <div style="margin-right: 4px;">CIS 281</div>
                                    <div>Chapter 14</div>
                                </div>
                            </div>
                            <img class="note-img" src="https://wiki.theplaz.com/w/images/thumb/American_Studies_Chap_17_-_Reconstruction_-_Politics_of_Reconstruction_Page_1.jpg/300px-American_Studies_Chap_17_-_Reconstruction_-_Politics_of_Reconstruction_Page_1.jpg">
                        </div>
                        <div class="note-preview">
                            <div class="note-information">
                                <div style="background: white; width: 35px; border-radius: 20px;">
                                    <iron-icon icon="star" style="padding: 5px; color: var(--main-color);"></iron-icon>
                                </div>
                                <div style="padding: 0 12px; display: flex; margin: auto;">
                                    <div style="margin-right: 4px;">CIS 281</div>
                                    <div>Chapter 14</div>
                                </div>
                            </div>
                            <img class="note-img" src="https://wiki.theplaz.com/w/images/thumb/American_Studies_Chap_17_-_Reconstruction_-_Politics_of_Reconstruction_Page_1.jpg/300px-American_Studies_Chap_17_-_Reconstruction_-_Politics_of_Reconstruction_Page_1.jpg">
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
@endsection
