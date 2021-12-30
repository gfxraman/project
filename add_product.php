<?php include "layout/header.php"; ?>
<link href="assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet">
<!--start page wrapper -->
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">eCommerce</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Orders</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Add New Product</h5>
					  <hr/>
                      <form id="add_product" method="post">
                       <div class="form-body mt-4">
					    <div class="row">
						   <div class="col-lg-8">
                           <div class="border border-3 p-4 rounded">
							<div class="mb-3">
								<label for="inputProductTitle" class="form-label">Product Title</label>
								<input type="text" name="product_title" class="form-control" id="ProductTitle" placeholder="Enter product title">
							  </div>
							  <div class="mb-3">
								<label for="inputProductDescription" class="form-label">Description</label>
								<textarea class="form-control" name="product_description" id="ProductDescription" rows="3"></textarea>
							  </div>
							  <div class="mb-3">
								<label for="inputProductDescription" class="form-label">Product Images</label>
								<input id="image-uploadify" name="product_image" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
							  </div>
                            </div>
						   </div>
						   <div class="col-lg-4">
							<div class="border border-3 p-4 rounded">
                              <div class="row g-3">
								<div class="col-md-6">
									<label for="inputPrice" class="form-label">Buy Price</label>
									<input type="text" class="form-control" name="product_price" id="buy_price" placeholder="00.00">
								  </div>
								  <div class="col-md-6">
									<label for="inputCompareatprice" class="form-label">Sell at Price</label>
									<input type="text" class="form-control" name="product_sell_price" id="sell_price" placeholder="00.00">
								  </div>
								
								 
								  <div class="col-12">
									<label for="inputProductType" class="form-label">Product Category</label>
									<select class="form-select" name="product_category" id="inputProductType">
										<option></option>
										
									  </select>
								  </div>
								  <div class="col-12">
									<label for="inputVendor" class="form-label">Vendor</label>
									<select class="form-select" id="inputVendor">
										<option></option>
										<option value="1">One</option>
										<option value="2">Two</option>
										<option value="3">Three</option>
									  </select>
								  </div>
								  <div class="col-12">
									<label for="inputCollection" class="form-label">Collection</label>
									<select class="form-select" id="inputCollection">
										<option></option>
										<option value="1">One</option>
										<option value="2">Two</option>
										<option value="3">Three</option>
									  </select>
								  </div>
								  <div class="col-12">
									<label for="inputProductTags" class="form-label">Product Tags</label>
									<input type="text" class="form-control" id="inputProductTags" placeholder="Enter Product Tags">
								  </div>
								  <div class="col-12">
									  <div class="d-grid">
                                         <button type="submit" class="btn btn-primary"> save </buuton>
									  </div>
								  </div>
							  </div> 
						  </div>
						  </div>
					   </div><!--end row-->
					</div>
                   </form>
				  </div>
			  </div>


			</div>
		</div>
		<!--end page wrapper -->

       
        <?php  include "layout/footer.php"; ?>
        <script>
            $.ajax({
                url:"function.php",
                type:"POST",
                dataType:"JSON",
                data:{getCategories:true},
                success:function(res){
                    $.each(res,function(index,data){
                       
              $('#inputProductType').append('<option value='+data.id+'>'+data.name+'</option>');


                    });

                }
				
            });

			$('#add_product').on("submit",function(){
      
     
				var formdata = new FormData(this);
                formdata.append('isproduct', true);
                formdata.append('product_image',$('#image-uploadify')[0].files[0]);
                formdata.append('product_title', $('#ProductTitle').val());
             	formdata.append('product_description', $('#ProductDescription').val());
				formdata.append('product_category', $('#inputProductType').val());
				formdata.append('buy_price', $('#buy_price').val());
				formdata.append('sell_price', $('#sell_price').val());



				
				$.ajax({
        url:"function.php",
        type:"POST",
		dataType:"JSON",
		data:formdata,
		cache: false,
        contentType: false,
        processData: false, 
        success:function(res){
            //  console.log(res)
              window.location.href="dashboard.php";
			location.reload();

        }
  
});



return false;

});
            </script>