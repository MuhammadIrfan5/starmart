<!-- Products content -->
<section class="new-products-content pro-content" >
  <div class="container">
    <div class="products-area">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-6">
          <div class="pro-heading-title">
            <h2> @lang('website.FEATURED PRODUCTS')
            </h2>
            <p>@lang('website.Featured Products Detail')
               </p>
          </div>
        </div>
      </div>
      <div class="row cat1-carousel-js">      
        @foreach($result['featured']['product_data'] as $key=>$products)
        <div class="col-12 col-sm-6 col-lg-3">
          <!-- Product -->
          @include('web.common.product')
        </div>
        @endforeach
        
      </div>
    </div>
  </div>  
</section>