@extends('user.layouts.app')
@section('pageTitle', $article->title)
@section('content')

    <section class="breadcrumb_area">
        <img class="p_absolute bl_left" src="/theme/img/v.svg" alt="">
        <img class="p_absolute bl_right" src="/theme/img/home_one/b_leaf.svg" alt="">
        <img class="p_absolute star" src="/theme/img/home_one/banner_bg.png" alt="">
        <img class="p_absolute wave_shap_one" src="/theme/img/blog-classic/shap_01.png" alt="">
        <img class="p_absolute wave_shap_two" src="/theme/img/blog-classic/shap_02.png" alt="">
        <img class="p_absolute one wow fadeInRight" src="/theme/img/home_one/b_man_two.png" alt="">
        <img class="p_absolute two wow fadeInUp" data-wow-delay="0.2s" src="/theme/img/home_one/flower.png" alt="">
        <div class="container custom_container">
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
        </div>
    </section>

    <section class="page_breadcrumb">
        <div class="container custom_container">
            <div class="row">
                <div class="col-sm-7">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('subjects.show', ['slug' => $article->subject->slug]) }}">{{ $article->subject->name }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $article->title }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-sm-5">
                    <a href="#" class="date"><i class="icon_clock_alt"></i>Updated on
                        {{ $article->created_at->format('F d, Y') }}</a>
                </div>
            </div>
        </div>
    </section>

    <section class="doc_documentation_area" id="sticky_doc">
        <div class="overlay_bg"></div>
        <div class="container custom_container">
            <div class="row">
                <div class="col-lg-3 doc_mobile_menu display_none">
                    <aside class="doc_left_sidebarlist">
                        <div class="open_icon" id="left">
                            <i class="arrow_carrot-right"></i>
                            <i class="arrow_carrot-left"></i>
                        </div>
                        <div class="scroll">
                            <h4>Related Articles</h4>
                            <ul class="list-unstyled nav-sidebar coding_nav">
                                @php
                                    $related_articles = App\models\Article::select('title', 'slug')
                                        ->where('subject_id', $article->subject_id)
                                        ->where('published', 1)
                                        ->where('id', '!=', $article->id)
                                        ->get()
                                        ->take(5);
                                @endphp
                                @foreach ($related_articles as $related_article)
                                    <li class="nav-item">
                                        <a href="{{ route('articles.show', ['slug' => $related_article->slug]) }}"
                                            class="nav-link"><i class="icon_book_alt"></i>
                                            &nbsp;{{ $related_article->title }}</a>
                                    </li>
                                @endforeach


                            </ul>
                            {{-- <ul class="list-unstyled nav-sidebar coding_nav">
                                <li class="nav-item">
                                    <a href="#" class="nav-link"><img src="/theme/img/side-nav/account.png"
                                            alt="">Account</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"><img src="/theme/img/side-nav/coding.png"
                                            alt="">Change Log</a>
                                </li>
                            </ul>
                            <ul class="list-unstyled nav-sidebar bottom_nav">

                                <li class="nav-item">
                                    <a href="#" class="nav-link"><img src="/theme/img/side-nav/edit.png"
                                            alt="">English </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"><img src="/theme/img/side-nav/users.png"
                                            alt="">Sign In <i class="arrow_right"></i></a>
                                </li>
                            </ul> --}}
                        </div>
                    </aside>
                </div>
                <div class="col-lg-9 col-md-9">
                    <article class="shortcode_info">
                        <div class="shortcode_title">
                            <h1>{{ $article->title }}</h1>
                            {{-- <p>{{ $article->title }}</p> --}}
                        </div>

                        <div class="pointing_img_container pointing_img_two">
                            {!! $article->content !!}

                            <br /><br />
                            <h4 class="c_head" id="article">Related Articles</h4>
                            <ul class="list-unstyled article_list tag_list">

                                @foreach ($related_articles as $related_article)
                                    <li><a href="{{ route('articles.show', ['slug' => $related_article->slug]) }}"><i
                                                class="icon_document_alt"></i>{{ $related_article->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <footer>
                            <div class="border_bottom"></div>
                            <div class="row feedback_link">
                                <div class="col-lg-6">
                                    <h6><i class="icon_mail_alt"></i>Still stuck? <a href="#" data-toggle="modal"
                                            data-target="#exampleModal3">How can we help?</a></h6>
                                </div>
                                <div class="col-lg-6">
                                    <p>Was this page helpful? <a href="#" class="h_btn">Yes</a><a href="#"
                                            class="h_btn">No</a></p>
                                </div>
                            </div>
                        </footer>

                    </article>
                </div>
            </div>
        </div>
    </section>
    @include('user.layouts.simple_footer')
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