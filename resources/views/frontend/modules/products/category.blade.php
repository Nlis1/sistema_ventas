@extends('frontend.layouts.main')

@section('titulo', $titulo)
    
@section('contenido')

  <main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Category</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Category</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <div class="container">
      <div class="row">

        <div class="col-lg-4 sidebar">

          <div class="widgets-container">

            <!-- Product Categories Widget -->
            <div class="product-categories-widget widget-item">

              <h3 class="widget-title">Categories</h3>

               <div class="category-grid" >
                        <div class="category-column">
                           <ul class="category-tree list-unstyled mb-3" id="listar-categories">

                          </ul>
                        </div>
                    </div>
            </div><!--/Product Categories Widget -->
          </div>

        </div>

        <div class="col-lg-8">

          <!-- Category Header Section -->
          <section id="category-header" class="category-header section">

            <div class="container" data-aos="fade-up">

              <!-- Filter and Sort Options -->
              <div class="filter-container mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="row g-3">
                  <div class="col-12 col-md-6 col-lg-4">
                    <div class="filter-item search-form">
                      <label for="texto" class="form-label">Buscar productos</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="texto" aria-label="Search for products">
                        <button class="btn search-btn" type="submit" onclick="Buscador(event)">
                          <i class="bi bi-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>

                  <div class="col-12 col-md-6 col-lg-2">
                    <div class="filter-item">
                      <label for="sortBy" class="form-label">Sort By</label>
                      <select class="form-select" id="sortBy">
                        <option selected="">Featured</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Customer Rating</option>
                        <option>Newest Arrivals</option>
                      </select>
                    </div>
                  </div>
                </div>

              </div>

            </div>

          </section><!-- /Category Header Section -->

          <!-- Category Product List Section -->
          <section id="category-product-list" class="category-product-list section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">
              <div class="row g-4" id="listar-products">
           

              </div>

            </div>

          </section><!-- /Category Product List Section -->

          <!-- Category Pagination Section -->
          <section id="category-pagination" class="category-pagination section">

            <div class="container">
              <nav class="d-flex justify-content-center" aria-label="Page navigation">
                <ul>
                  <li>
                    <a href="#" aria-label="Previous page">
                      <i class="bi bi-arrow-left"></i>
                      <span class="d-none d-sm-inline">Previous</span>
                    </a>
                  </li>

                  <li><a href="#" class="active">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li class="ellipsis">...</li>
                  <li><a href="#">8</a></li>
                  <li><a href="#">9</a></li>
                  <li><a href="#">10</a></li>

                  <li>
                    <a href="#" aria-label="Next page">
                      <span class="d-none d-sm-inline">Next</span>
                      <i class="bi bi-arrow-right"></i>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>

          </section><!-- /Category Pagination Section -->

        </div>

      </div>
    </div>

  </main>
    
@endsection