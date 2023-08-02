@extends('user.layouts.app')
@section('pageTitle', 'Home')
@section('content')

    <section class="doc_banner_area_one mb-3">
        <img class="dark" src="/theme/img/home_one/wave_one.svg" alt="">
        <img class="dark_two" src="/theme/img/home_one/wave_two.svg" alt="">
        <img class="p_absolute star_one" src="/theme/img/home_one/star.png" alt="">
        <img class="p_absolute star_two" src="/theme/img/home_one/star.png" alt="">
        <img class="p_absolute star_three" src="/theme/img/home_one/star.png" alt="">
        <img class="p_absolute one wow fadeInLeft" data-wow-delay="0.1s" src="/theme/img/home_one/b_man.png" alt="">
        <img class="p_absolute two wow fadeInRight" data-wow-delay="0.2s" src="/theme/img/home_one/b_man_two.png"
            alt="">
        <img class="p_absolute three wow fadeInUp" data-wow-delay="0.3s" src="/theme/img/home_one/flower.png"
            alt="">
        <img class="p_absolute four wow fadeInRight" data-wow-delay="0.4s" src="/theme/img/home_one/girl_img.png"
            alt="">
        <img class="p_absolute five wow fadeIn" data-wow-delay="0.5s" src="/theme/img/home_one/file.png" alt="">
        <img class="p_absolute bl_left" src="/theme/img/v.svg" alt="">
        <img class="p_absolute bl_right" src="/theme/img/home_one/b_leaf.svg" alt="">
        <div class="container">
            <div class="doc_banner_text">
                <h2 class="wow fadeInUp" data-wow-delay="0.3s">Welcome to IntelS Help Center</h2>
                <p class="wow fadeInUp" data-wow-delay="0.5s">Explore helpful how-tos and guides for efficient school
                    management</p>
                    <style>
                        .search-result-item {
                            margin-bottom: 3px;
                            padding: 10px;
                            border: 1px solid #000;
                            background-color: #fff;
                            color: #000;
                            cursor: pointer;
                        }
                    
                        .search-result-item.selected {
                            background-color: #000;
                            color: #fff;
                        }
                    </style>
                    
                    
                    <form action="#" class="banner_search_form" id="searchForm" style="position: relative;">
                        <div class="input-group">
                            <input type="search" class="form-control" placeholder='Type your question or topic here ("/" to focus)' id="searchInput">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary"><i class="icon_search"></i></button>
                            </div>  
                        </div>
                        <div id="searchResults" class="mt-2" style="position: absolute; width: 100%; top: 100%; margin-top: 10px;"></div>
                    </form>
                    
                   
                {{-- <h6><span>Popular topics:</span> <a href="#">Add a Map with a Market</a> <a href="#">Styling a
                        Map</a></h6> --}}
            </div>
        </div>
    </section>



    <section class="doc_tag_area">
        <div class="container">
            <div class="section_title text-center">
                <h2 class="h_title wow fadeInUp">Popular User Types</h2>
            </div>
            <ul class="nav nav-tabs doc_tag" id="myTab" role="tablist">
                <li class="nav-item wow fadeInLeft">
                    <a class="nav-link active" id="or-tab" data-toggle="tab" href="#or" role="tab"
                        aria-controls="or" aria-selected="true">Administrators</a>
                </li>
                <li class="nav-item wow fadeInLeft" data-wow-delay="0.1s">
                    <a class="nav-link" id="doc-tab" data-toggle="tab" href="#doc" role="tab" aria-controls="doc"
                        aria-selected="false">Teachers</a>
                </li>
                <li class="nav-item wow fadeInLeft" data-wow-delay="0.2s">
                    <a class="nav-link" id="forum-tab" data-toggle="tab" href="#forum" role="tab" aria-controls="forum"
                        aria-selected="false">Parents</a>
                </li>
                <li class="nav-item wow fadeInLeft" data-wow-delay="0.3s">
                    <a class="nav-link" id="code-tab" data-toggle="tab" href="#code" role="tab" aria-controls="code"
                        aria-selected="false">Account Officer</a>
                </li>
                <li class="nav-item wow fadeInLeft" data-wow-delay="0.4s">
                    <a class="nav-link" id="element-tab" data-toggle="tab" href="#element" role="tab"
                        aria-controls="element" aria-selected="false">Proprietors</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane doc_tab_pane fade show active" id="or" role="tabpanel"
                    aria-labelledby="or-tab">
                    <div class="row">

                        @php
                            $subjects = App\Models\Subject::where('user_role_id', 'LIKE', '%' . 1 . '%')->get();
                        @endphp

                        @foreach ($subjects as $subject)
                            @php
                                $articles = App\Models\Article::select('title', 'slug')
                                    ->where('subject_id', $subject->id)
                                    ->where('published', 1)
                                    ->where('featured', 1)
                                    ->get()
                                    ->take(5);
                            @endphp
                            <div class="col-lg-4 col-sm-6">
                                <div class="doc_tag_item wow fadeInUp">
                                    <div class="doc_tag_title">
                                        <h4>{{ $subject->name }}</h4>
                                        <div class="line"></div>
                                    </div>
                                    <ul class="list-unstyled tag_list">
                                        @foreach ($articles as $article)
                                            <li><a href="{{ route('articles.show', ['slug' => $article->slug]) }}"><i
                                                        class="icon_document_alt"></i>{{ $article->title }}</a></li>
                                        @endforeach

                                    </ul>
                                    <a href="{{ route('subjects.show', ['slug' => $subject->slug]) }}"
                                        class="learn_btn">View All ({{ $articles->count() }} Articles)<i
                                            class="arrow_right"></i></a>
                                </div>
                            </div>
                        @endforeach




                    </div>
                </div>
                <div class="tab-pane fade" id="doc" role="tabpanel" aria-labelledby="doc-tab">
                    <div class="row">

                        @php
                            $subjects = App\Models\Subject::where('user_role_id', 'LIKE', '%' . 2 . '%')->get();
                        @endphp

                        @foreach ($subjects as $subject)
                            @php
                                $articles = App\Models\Article::select('title', 'slug')
                                    ->where('subject_id', $subject->id)
                                    ->where('published', 1)
                                    ->where('featured', 1)
                                    ->get()
                                    ->take(5);
                            @endphp
                            <div class="col-lg-4 col-sm-6">
                                <div class="doc_tag_item wow fadeInUp">
                                    <div class="doc_tag_title">
                                        <h4>{{ $subject->name }}</h4>
                                        <div class="line"></div>
                                    </div>
                                    <ul class="list-unstyled tag_list">
                                        @foreach ($articles as $article)
                                            <li><a href="{{ route('articles.show', ['slug' => $article->slug]) }}"><i
                                                        class="icon_document_alt"></i>{{ $article->title }}</a></li>
                                        @endforeach

                                    </ul>
                                    <a href="{{ route('subjects.show', ['slug' => $subject->slug]) }}"
                                        class="learn_btn">View All ({{ $articles->count() }} Articles)<i
                                            class="arrow_right"></i></a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="tab-pane fade" id="forum" role="tabpanel" aria-labelledby="forum-tab">
                    <div class="row">

                        @php
                            $subjects = App\Models\Subject::where('user_role_id', 'LIKE', '%' . 3 . '%')->get();
                        @endphp

                        @foreach ($subjects as $subject)
                            @php
                                $articles = App\Models\Article::select('title', 'slug')
                                    ->where('subject_id', $subject->id)
                                    ->where('published', 1)
                                    ->where('featured', 1)
                                    ->get()
                                    ->take(5);
                            @endphp
                            <div class="col-lg-4 col-sm-6">
                                <div class="doc_tag_item wow fadeInUp">
                                    <div class="doc_tag_title">
                                        <h4>{{ $subject->name }}</h4>
                                        <div class="line"></div>
                                    </div>
                                    <ul class="list-unstyled tag_list">
                                        @foreach ($articles as $article)
                                            <li><a href="{{ route('articles.show', ['slug' => $article->slug]) }}"><i
                                                        class="icon_document_alt"></i>{{ $article->title }}</a></li>
                                        @endforeach

                                    </ul>
                                    <a href="{{ route('subjects.show', ['slug' => $subject->slug]) }}"
                                        class="learn_btn">View All ({{ $articles->count() }} Articles)<i
                                            class="arrow_right"></i></a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="tab-pane fade" id="code" role="tabpanel" aria-labelledby="code-tab">
                    <div class="row">

                        @php
                            $subjects = App\Models\Subject::where('user_role_id', 'LIKE', '%' . 4 . '%')->get();
                        @endphp

                        @foreach ($subjects as $subject)
                            @php
                                $articles = App\Models\Article::select('title', 'slug')
                                    ->where('subject_id', $subject->id)
                                    ->where('published', 1)
                                    ->where('featured', 1)
                                    ->get()
                                    ->take(5);
                            @endphp
                            <div class="col-lg-4 col-sm-6">
                                <div class="doc_tag_item wow fadeInUp">
                                    <div class="doc_tag_title">
                                        <h4>{{ $subject->name }}</h4>
                                        <div class="line"></div>
                                    </div>
                                    <ul class="list-unstyled tag_list">
                                        @foreach ($articles as $article)
                                            <li><a href="{{ route('articles.show', ['slug' => $article->slug]) }}"><i
                                                        class="icon_document_alt"></i>{{ $article->title }}</a></li>
                                        @endforeach

                                    </ul>
                                    <a href="{{ route('subjects.show', ['slug' => $subject->slug]) }}"
                                        class="learn_btn">View All ({{ $articles->count() }} Articles)<i
                                            class="arrow_right"></i></a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="tab-pane fade" id="element" role="tabpanel" aria-labelledby="element-tab">
                    <div class="row">

                        @php
                            $subjects = App\Models\Subject::where('user_role_id', 'LIKE', '%' . 5 . '%')->get();
                        @endphp

                        @foreach ($subjects as $subject)
                            @php
                                $articles = App\Models\Article::select('title', 'slug')
                                    ->where('subject_id', $subject->id)
                                    ->where('published', 1)
                                    ->where('featured', 1)
                                    ->get()
                                    ->take(5);
                            @endphp
                            <div class="col-lg-4 col-sm-6">
                                <div class="doc_tag_item wow fadeInUp">
                                    <div class="doc_tag_title">
                                        <h4>{{ $subject->name }}</h4>
                                        <div class="line"></div>
                                    </div>
                                    <ul class="list-unstyled tag_list">
                                        @foreach ($articles as $article)
                                            <li><a href="{{ route('articles.show', ['slug' => $article->slug]) }}"><i
                                                        class="icon_document_alt"></i>{{ $article->title }}</a></li>
                                        @endforeach

                                    </ul>
                                    <a href="{{ route('subjects.show', ['slug' => $subject->slug]) }}"
                                        class="learn_btn">View All ({{ $articles->count() }} Articles)<i
                                            class="arrow_right"></i></a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="doc_faq_area sec_pad">
        <div class="container">
            <div class="section_title text-center">
                <h2 class="h_title wow fadeInUp">Do you have any Question?</h2>
                <p class="wow fadeInUp" data-wow-delay="0.2s">Review and read our Frequently Asked Questions.</p>
            </div>
            <ul class="nav nav-tabs doc_tag" id="myTabthree" role="tablist">
                <li class="nav-item wow fadeInLeft">
                    <a class="nav-link active" id="ter-tab" data-toggle="tab" href="#ter" role="tab"
                        aria-controls="or" aria-selected="true">Administrator</a>
                </li>
                <li class="nav-item wow fadeInLeft" data-wow-delay="0.1s">
                    <a class="nav-link" id="docOne-tab" data-toggle="tab" href="#docOne" role="tab"
                        aria-controls="doc" aria-selected="false">Teacher</a>
                </li>
                <li class="nav-item wow fadeInLeft" data-wow-delay="0.2s">
                    <a class="nav-link" id="forumOne-tab" data-toggle="tab" href="#forumOne" role="tab"
                        aria-controls="forum" aria-selected="false">Parent</a>
                </li>
               
                </li>
                <li class="nav-item wow fadeInLeft" data-wow-delay="0.4s">
                    <a class="nav-link" id="atlas-tab" data-toggle="tab" href="#atlas" role="tab"
                        aria-controls="code" aria-selected="false">Proprietor</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContentthree">
                <div class="tab-pane faq_tab_pane fade show active" id="ter" role="tabpanel"
                    aria-labelledby="ter-tab">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="accordion doc_faq_info" id="accordionExample">
                                <div class="card active">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                How do I add new users to the system?<i class="icon_plus"></i><i
                                                    class="icon_minus-06"></i>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            To add new users to the system, you need administrative privileges. Navigate to the "User Management" section in the dashboard. Click on "Add New User" and fill in the required details such as name, email, class, etc. Random password will be generated automatically. Save the changes, and the user will be added to the system.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseTwo" aria-expanded="false"
                                                aria-controls="collapseTwo">
                                                How can I generate financial reports for the school?<i class="icon_plus"></i><i
                                                    class="icon_minus-06"></i>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            To generate financial reports for the school, go to the "Fees & Billing" section in the system. There, you can access various financial reports like income statements, fee collection progress, debtors, expenses, etc. Customize the date range and other filters as needed, then click on "Generate Report" to obtain the financial data.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseThree" aria-expanded="false"
                                                aria-controls="collapseThree">
                                                How do I enroll students in different classes and sections? <i class="icon_plus"></i><i
                                                    class="icon_minus-06"></i>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            To enroll students in different classes and sections, go to the "Student Management" section. Locate the student you want to enroll and click on "Add New Student." From there, you can assign the student to their respective class and section. Save the changes to complete the enrollment process.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingFour">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseFour" aria-expanded="false"
                                                aria-controls="collapseFour">
                                                How do I manage teacher assignments and subject allocations?<i class="icon_plus"></i><i
                                                    class="icon_minus-06"></i>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            To manage teacher assignments and subject allocations, go to the "Users > Staffs" section. Edit the teacher's profile and assign them to specific subjects and classes. Make sure to save the changes, and the teacher will be assigned accordingly.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingfive">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapsefive" aria-expanded="false"
                                                aria-controls="collapsefive">
                                                Can I set up automatic notifications for fee payment reminders? <i class="icon_plus"></i><i
                                                    class="icon_minus-06"></i>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapsefive" class="collapse" aria-labelledby="headingfive"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            Yes, you can set up automatic notifications for fee payment reminders. Go to the "Notification Settings" section and configure the fee payment reminder notification. Specify the frequency and timing of the reminders, and the system will automatically send them to parents or guardians.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="accordion doc_faq_info" id="accordionExamples">
                                <div class="card">
                                    <div class="card-header" id="headingSix">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseSix" aria-expanded="false"
                                                aria-controls="collapseSix">
                                                Is it possible to generate and print student ID cards directly from the system?<i class="icon_plus"></i><i
                                                    class="icon_minus-06"></i>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                                        data-parent="#accordionExamples">
                                        <div class="card-body">
                                            es, you can generate and print student ID cards directly from the system. In the "ID Card" section, select the class for which you want to generate ID cards. Click on "Print ID Cards," and the system will generate printable ID cards with student details and photos.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingSeven">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseSeven" aria-expanded="false"
                                                aria-controls="collapseSeven">
                                                How can I set up and manage online exams and assessments for students?<i class="icon_plus"></i><i
                                                    class="icon_minus-06"></i>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven"
                                        data-parent="#accordionExamples">
                                        <div class="card-body">
                                            To set up and manage online exams and assessments, go to the "CBT" section. Create new exam schedules and questions, assign them to specific classes, and set the exam duration. Students can then access and complete the exams online.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingEight">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseEight" aria-expanded="false"
                                                aria-controls="collapseEight">How do I handle student transfers between classes or sections?
                                                <i class="icon_plus"></i><i
                                                    class="icon_minus-06"></i>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseEight" class="collapse" aria-labelledby="headingEight"
                                        data-parent="#accordionExamples">
                                        <div class="card-body">
                                            To handle student transfers between classes or sections, go to the "Student Transfer" section. Choose the student you want to transfer, specify the new class or section, and provide a reason for the transfer. Confirm the transfer, and the student's records will be updated accordingly.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingNine">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseNine" aria-expanded="false"
                                                aria-controls="collapseNine">
                                                Is there a way to archive and store past academic records and data securely?<i class="icon_plus"></i><i
                                                    class="icon_minus-06"></i>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseNine" class="collapse" aria-labelledby="headingNine"
                                        data-parent="#accordionExamples">
                                        <div class="card-body">
                                            Yes, you can archive and store past academic records and data securely. The system has a data archiving feature that allows you to save historical academic records. You can set access restrictions to ensure the data is securely stored and accessible only to authorized personnel.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTen">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseTen" aria-expanded="false"
                                                aria-controls="collapseTen">
                                                How do I generate and share progress reports with parents and guardians? <i class="icon_plus"></i><i
                                                    class="icon_minus-06"></i>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTen" class="collapse" aria-labelledby="headingTen"
                                        data-parent="#accordionExamples">
                                        <div class="card-body">
                                            To generate and share progress reports with parents and guardians, go to the "Academic Records" section. Select the desired report format (e.g., term report card) and the students you want to include. Click on "Generate Reports," and you can either print the reports or send them digitally to parents.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane faq_tab_pane fade" id="docOne" role="tabpanel" aria-labelledby="docOne-tab">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="accordion doc_faq_info" id="accordionExampledoc">
                                <div class="card">
                                    <div class="card-header" id="headingEleven">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#collapseEleven" aria-expanded="true"
                                                aria-controls="collapseEleven">
                                                How do I record attendance for my students in the system?<i class="icon_plus"></i><i
                                                    class="icon_minus-06"></i>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseEleven" class="collapse show" aria-labelledby="headingEleven"
                                        data-parent="#accordionExampledoc">
                                        <div class="card-body">
                                            To record attendance for your students, navigate to the "Attendance" section in the system. Select the date and mark the attendance status for each student (e.g., Present, Absent, Late). Save the changes to update the attendance records.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingtwelve">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapsetwelve" aria-expanded="false"
                                                aria-controls="collapsetwelve">
                                                Is there a way to create and share online assignments with students?
                                                <i class="icon_plus"></i><i
                                                    class="icon_minus-06"></i>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapsetwelve" class="collapse" aria-labelledby="headingtwelve"
                                        data-parent="#accordionExampledoc">
                                        <div class="card-body">
                                            Yes, you can create and share online assignments with your students. Go to the "Assignments" section and click on "Create New Assignment." Fill in the details, attach any necessary files, and set the due date. Once the assignment is created, share it with your students, and they will be able to access and submit their work online.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingthirteen">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapsethirteen" aria-expanded="false"
                                                aria-controls="collapsethirteen">
                                                How can I access and update the academic progress of my students?
                                                <i class="icon_plus"></i><i
                                                    class="icon_minus-06"></i>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapsethirteen" class="collapse" aria-labelledby="headingthirteen"
                                        data-parent="#accordionExampledoc">
                                        <div class="card-body">
                                            You can access and update the academic progress of your students through the "Grades" or "Progress Reports" section. Review individual student records, update their grades, and provide any additional comments or feedback as needed.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingfourteen">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapsefourteen" aria-expanded="false"
                                                aria-controls="collapsefourteen">
                                                What steps should I follow to schedule and conduct parent-teacher conferences?
                                                <i class="icon_plus"></i><i
                                                    class="icon_minus-06"></i>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapsefourteen" class="collapse" aria-labelledby="headingfourteen"
                                        data-parent="#accordionExampledoc">
                                        <div class="card-body">
                                            To schedule and conduct parent-teacher conferences, access the "Calendar" or "Events" section in the system. Create a new event for the conference and set the date, time, and location. Send invitations to parents/guardians, and they can confirm their attendance through the system.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingfifteenth">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapsefifteenth" aria-expanded="false"
                                                aria-controls="collapsefifteenth">
                                                Can I track and manage student behavior and disciplinary actions using the system?
                                                <i class="icon_plus"></i><i
                                                    class="icon_minus-06"></i>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapsefifteenth" class="collapse" aria-labelledby="headingfifteenth"
                                        data-parent="#accordionExampledoc">
                                        <div class="card-body">
                                            Yes, you can track and manage student behavior and disciplinary actions using the system. Navigate to the "Student Behavior" or "Disciplinary Actions" section, where you can log incidents, assign consequences, and keep a record of student behavior for reference and reporting purposes.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="accordion doc_faq_info" id="accordionExampledocTwo">
                                
                                <div class="card">
                                    <div class="card-header" id="headingsixteenth">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapsesixteenth" aria-expanded="false"
                                                aria-controls="collapsesixteenth">
                                                How can I communicate with parents and guardians about their child's progress and performance?<i class="icon_plus"></i><i
                                                    class="icon_minus-06"></i>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapsesixteenth" class="collapse" aria-labelledby="headingsixteenth"
                                        data-parent="#accordionExampledocTwo">
                                        <div class="card-body">
                                            You can easily communicate with parents and guardians through the system's integrated messaging feature. Navigate to the "Messages" or "Communication" section, and select the option to compose a new message. Choose the recipients (parents/guardians), type your message, and click "Send." Parents will receive the message through their preferred communication channel (e.g., email, SMS). This way, you can keep parents informed about their child's academic progress, upcoming events, and any other important updates.
                                        </div>
                                    </div>
                                </div>
                        
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane faq_tab_pane fade" id="forumOne" role="tabpanel" aria-labelledby="forumOne-tab">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="accordion doc_faq_info" id="accordionExampleforum">
                                
                                <div class="card">
                                    <div class="card-header" id="headingTwentyone">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#collapseTwentyone" aria-expanded="true"
                                                aria-controls="collapseTwentyone">
                                                How can I track my child's attendance record and know if they are attending classes regularly?<i class="icon_plus"></i><i
                                                    class="icon_minus-06"></i>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwentyone" class="collapse show" aria-labelledby="headingTwentyone"
                                        data-parent="#accordionExampleforum">
                                        <div class="card-body">
                                            You can easily track your child's attendance record by logging into the parent portal of the school management system. Navigate to the "Attendance" section, where you will find a detailed attendance report for your child. This report will show the number of days attended, absent, and any late arrivals. If you have any concerns or notice any discrepancies, you can communicate with the school administration through the system's messaging feature.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwentytwo">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseTwentytwo" aria-expanded="false"
                                                aria-controls="collapseTwentytwo">
                                                Is there a way to view my child's academic performance and grades in various subjects?<i class="icon_plus"></i><i
                                                    class="icon_minus-06"></i>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwentytwo" class="collapse" aria-labelledby="headingTwentytwo"
                                        data-parent="#accordionExampleforum">
                                        <div class="card-body">
                                            Yes, you can access your child's academic performance and grades through the parent portal. Simply go to the "Grades" or "Progress Reports" section, where you will find a comprehensive overview of your child's grades for each subject. You can view past report cards and monitor their progress throughout the academic year. Additionally, you can communicate with teachers if you have any questions or need further information.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwentythree">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseTwentythree" aria-expanded="false"
                                                aria-controls="collapseTwentythree">
                                                How can I stay updated on school events, important dates, and announcements? <i class="icon_plus"></i><i
                                                    class="icon_minus-06"></i>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwentythree" class="collapse" aria-labelledby="headingTwentythree"
                                        data-parent="#accordionExampleforum">
                                        <div class="card-body">
                                            The school management system provides a calendar feature where all school events, important dates, and announcements are listed. You can access this calendar through the parent portal to stay informed about parent-teacher meetings, holidays, exams, and other school-related activities. Additionally, you will receive automatic notifications and reminders for upcoming events via email or SMS.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwentyfour">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseTwentyfour" aria-expanded="false"
                                                aria-controls="collapseTwentyfour">
                                                Can I make online payments for school fees and other expenses?
                                                <i class="icon_plus"></i><i
                                                    class="icon_minus-06"></i>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwentyfour" class="collapse" aria-labelledby="headingTwentyfour"
                                        data-parent="#accordionExampleforum">
                                        <div class="card-body">
                                            Yes, the school management system offers a secure online payment gateway where you can conveniently pay school fees and other expenses. Log in to the parent portal, navigate to the "Payments" or "Fees" section, and follow the instructions to make online payments. You can choose from various payment options and receive a receipt for each transaction.
                                        </div>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="accordion doc_faq_info" id="accordionExampleforumTwo">
                              
                                <div class="card">
                                    <div class="card-header" id="headingTwentysix">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseTwentysix" aria-expanded="false"
                                                aria-controls="collapseTwentysix">
                                                How can I communicate with my child's teachers and school administration?

                                                <i class="icon_plus"></i><i
                                                    class="icon_minus-06"></i>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwentysix" class="collapse" aria-labelledby="headingTwentysix"
                                        data-parent="#accordionExampleforumTwo">
                                        <div class="card-body">
                                            You can easily communicate with your child's teachers and school administration through the messaging feature in the parent portal. Simply compose a message, select the recipient (teacher or school staff), type your message, and click "Send." This communication channel allows you to discuss your child's progress, share concerns, and stay informed about their academic journey.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwentyseven">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseTwentyseven" aria-expanded="false"
                                                aria-controls="collapseTwentyseven">
                                                Is there a way to access and download my child's academic records and progress reports?<i class="icon_plus"></i><i
                                                    class="icon_minus-06"></i>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwentyseven" class="collapse" aria-labelledby="headingTwentyseven"
                                        data-parent="#accordionExampleforumTwo">
                                        <div class="card-body">
                                            Yes, you can access and download your child's academic records and progress reports directly from the parent portal. Navigate to the "Reports" or "Academic Records" section, where you will find downloadable PDF files of progress reports, report cards, and other academic documents. You can save and print these records for your reference or future use.
                                        </div>
                                    </div>
                                </div>
                          
                            </div>
                        </div>
                    </div>
                </div>
              
                <div class="tab-pane faq_tab_pane fade" id="atlas" role="tabpanel" aria-labelledby="atlas-tab">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="accordion doc_faq_info" id="accordionExampleatlas">
                               
                                <div class="card">
                                    <div class="card-header" id="headingAtlasone">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#collapseAtlasone" aria-expanded="true"
                                                aria-controls="collapseAtlasone">
                                                How can I access financial reports and track the school's financial performance?<i class="icon_plus"></i><i
                                                    class="icon_minus-06"></i>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseAtlasone" class="collapse show" aria-labelledby="headingAtlasone"
                                        data-parent="#accordionExampleatlas">
                                        <div class="card-body">
                                            As a proprietor, you have access to the financial reports and analytics through the IntelPS. Simply log in to your admin dashboard and navigate to the "Financial Reports" section. Here, you will find detailed reports on income, expenses, cash flow, and other financial metrics, helping you track the school's financial performance and make informed decisions.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingAtlastwo">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseAtlastwo" aria-expanded="false"
                                                aria-controls="collapseAtlastwo">
                                                Is it possible to view the school's overall attendance and student enrollment data?
                                                <i class="icon_plus"></i><i
                                                    class="icon_minus-06"></i>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseAtlastwo" class="collapse" aria-labelledby="headingAtlastwo"
                                        data-parent="#accordionExampleatlas">
                                        <div class="card-body">
                                            Yes, you can easily view the school's overall attendance and student enrollment data from the admin dashboard. The "Attendance" and "Enrollment" sections provide comprehensive data on student attendance rates, enrollment statistics, and trends. This information allows you to assess the school's performance and plan for future growth.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingAtlasthree">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button"
                                                data-toggle="collapse" data-target="#collapseAtlasthree"
                                                aria-expanded="false" aria-controls="collapseAtlasthree">
                                                How can I monitor teacher assignments and ensure optimal subject allocations?
                                                <i class="icon_plus"></i><i
                                                    class="icon_minus-06"></i>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseAtlasthree" class="collapse" aria-labelledby="headingAtlasthree"
                                        data-parent="#accordionExampleatlas">
                                        <div class="card-body">
                                            You can manage teacher assignments and subject allocations from the admin dashboard. In the "Teachers" section, you have the option to assign teachers to specific classes and subjects. By efficiently managing teacher resources, you can ensure that the right teachers are allocated to their respective subjects, enhancing the quality of education.
                                        </div>
                                    </div>
                                </div>
                          
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="accordion doc_faq_info" id="accordionExampleatlastwo">
                                
                                <div class="card">
                                    <div class="card-header" id="headingAtlassix">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button"
                                                data-toggle="collapse" data-target="#collapseAtlassix"
                                                aria-expanded="false" aria-controls="collapseAtlassix">
                                                Is there a feature to automate fee payment reminders and notifications for parents?<i class="icon_plus"></i><i
                                                    class="icon_minus-06"></i>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseAtlassix" class="collapse" aria-labelledby="headingAtlassix"
                                        data-parent="#accordionExampleatlastwo">
                                        <div class="card-body">
                                            Yes, the IntelPS offers an automated notification system that sends fee payment reminders to parents. You can customize the notification settings and schedule reminders for fee due dates. This feature helps streamline the fee collection process and reduces the number of overdue payments.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingAtlasseven">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button"
                                                data-toggle="collapse" data-target="#collapseAtlasseven"
                                                aria-expanded="false" aria-controls="collapseAtlasseven">
                                                Can I generate and print student ID cards directly from the system?<i class="icon_plus"></i><i
                                                    class="icon_minus-06"></i>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseAtlasseven" class="collapse" aria-labelledby="headingAtlasseven"
                                        data-parent="#accordionExampleatlastwo">
                                        <div class="card-body">
                                            Absolutely! With the IntelPS, you can easily generate and print student ID cards. Go to the "Student ID Cards" section in the admin dashboard, upload the school logo, and customize the design. Once the design is finalized, you can print ID cards for all students, ensuring a professional and organized identification system.
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="doc_action_area parallaxie" data-background="img/bg.jpg"
        style="background: url(/theme/img/home_one/action_bg.jpg) no-repeat scroll;">
        <div class="overlay_bg"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9 col-sm-8">
                    <div class="action_text">
                        <h2>Can't find an answer?</h2>
                        <p>Head over to our WhatsApp channel</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4">
                    <a href="https://wa.me/2348033174228?text=Hi%2C%20I'm%20interested%20in%20your%20school.%20Please%20provide%20your%20name%20and%20school.%20Thanks!"
                    class="action_btn">WhatsApp Channel <i class="arrow_right"></i></a>
                </div>
            </div>
        </div>
    </section>
    @include('user.layouts.footer')
@endsection

@section('js')
<script>
    $(document).ready(function() {
        var searchResultsDiv = $('#searchResults');

        // Listen for keyup events on the search input
        $('#searchInput').keyup(function() {
            // Get the search query from the input field
            var searchQuery = $(this).val();

            if (searchQuery === '') {
                searchResultsDiv.empty();
                return;
            }

            // Make an Ajax request to search for topics
            $.ajax({
                url: '/search-topics', // Replace this with the actual URL for your search endpoint
                type: 'GET',
                data: { query: searchQuery }, // Pass the search query as a parameter
                dataType: 'json',
                success: function(response) {
                    // Handle the response from the server (e.g., update the UI with search results)
                    displaySearchResults(response);
                },
                error: function(error) {
                    // Handle any errors that occurred during the Ajax request
                    console.error(error);
                }
            });
        });

        // Function to display search results in the searchResults div
        function displaySearchResults(results) {
            searchResultsDiv.empty(); // Clear previous search results

            if (results.length === 0) {
                // If no results are found, display "No result found"
                searchResultsDiv.append('<div class="search-result-item">No result found</div>');
            } else {
                // Loop through the search results and append them to the searchResultsDiv
                $.each(results, function(index, article) {
                    var resultItem = $('<div class="search-result-item"><a href="articles/' + article.slug + '">' + article.title + '</a></div>');
                    searchResultsDiv.append(resultItem);
                });
            }
        }

        // Highlight selected result on click
        $(document).on('click', '.search-result-item', function() {
            $('.search-result-item').removeClass('selected');
            $(this).addClass('selected');
        });

        // Clear search results when all inputs are cleared
        $('#searchForm').on('reset', function() {
            searchResultsDiv.empty();
        });
    });
</script>

@endsection

