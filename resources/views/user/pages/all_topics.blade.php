@extends('user.layouts.app')
@section('pageTitle', "all")
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
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item item"><a href="#">{{ $subject->name }}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

  

    <section class="community-posts-area">
        <div class="container">
            <div class="section_title text-center">
                <h2 class="h_title wow fadeInUp">
                    {{ $subject->name }}
                </h2>
            </div>

            <div class="community-posts-wrapper">
              
                @foreach ($articles as $article)
                <div class="community-post wow fadeInUp" data-wow-delay="0.5s">
                    <div class="post-content">
                        <div class="entry-content">
                            <h3 class="post-title">
                                <i class="fas fa-angle-double-right"></i>
                                <a href="{{ route('articles.show', ['slug' => $article->slug]) }}">{{ $article->title }}</a>
                            </h3>
                        </div>
                    </div>
                </div>
                @endforeach


                
            </div>
            <!-- /.community-posts-wrapper -->
        </div>
        <!-- /.container -->
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

