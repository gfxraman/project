<?php include "layout/header.php"; ?>

	<!--start page wrapper -->
	<div class="page-wrapper">
			<div class="page-content">

				<div class="row">
				<div class="col-12">
						<div class="card">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-lg-3 col-xl-2">
										<a herf="add_product.php" class="btn btn-primary mb-3 mb-lg-0"><i class="bx bxs-plus-square" id="editproducts"></i>New Product</a>
									</div>
									<div class="col-lg-9 col-xl-10">
										<form class="float-lg-end">
											<div class="row row-cols-lg-2 row-cols-xl-auto g-2">
												<div class="col">
													<div class="position-relative">
														<input type="text" class="form-control ps-5" placeholder="Search Product..."> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
													</div>
												</div>
												<div class="col">
													<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
														<button type="button" class="btn btn-white">Sort By</button>
														<div class="btn-group" role="group">
														  <button id="btnGroupDrop1" type="button" class="btn btn-white dropdown-toggle dropdown-toggle-nocaret px-1" data-bs-toggle="dropdown" aria-expanded="false">
															<i class="bx bx-chevron-down"></i>
														  </button>
														  <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
															<li><a class="dropdown-item" href="#">Dropdown link</a></li>
															<li><a class="dropdown-item" href="#">Dropdown link</a></li>
														  </ul>
														</div>
													  </div>
												</div>
												<div class="col">
													<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
														<button type="button" class="btn btn-white">Collection Type</button>
														<div class="btn-group" role="group">
														  <button id="btnGroupDrop1" type="button" class="btn btn-white dropdown-toggle dropdown-toggle-nocaret px-1" data-bs-toggle="dropdown" aria-expanded="false">
															<i class="bx bxs-category"></i>
														  </button>
														  <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
															<li><a class="dropdown-item" href="#">Dropdown link</a></li>
															<li><a class="dropdown-item" href="#">Dropdown link</a></li>
														  </ul>
														</div>
													  </div>
												</div>
												<div class="col">
													<div class="btn-group" role="group">
														<button type="button" class="btn btn-white">Price Range</button>
														<div class="btn-group" role="group">
														  <button id="btnGroupDrop1" type="button" class="btn btn-white dropdown-toggle dropdown-toggle-nocaret px-1" data-bs-toggle="dropdown" aria-expanded="false">
															<i class="bx bx-slider"></i>
														  </button>
														  <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="btnGroupDrop1">
															<li><a class="dropdown-item" href="#">Dropdown link</a></li>
															<li><a class="dropdown-item" href="#">Dropdown link</a></li>
														  </ul>
														</div>
													  </div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
<!-- products -->
				<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">



			</div>

		<!--end page wrapper -->

<!-- 
modal -->
<div class="modal fade" id="productsedit" tabindex="-1" aria-hidden="true">
					<div class="modal-dialog modal-lg modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header bg-dark">
								<h5 class="modal-title text-white">Edit user</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body text-white editproductsForm">
							
						</div>
						</div>
				

	



<?php  include "layout/footer.php"; ?>

	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
   $.ajax({
     url:"function.php",
     type:"POST",
     dataType:"JSON",
	 data:{isallproducts:true},
     success:function(res){

      //  console.log(res);
      
      
       $.each(res,function(index,data){
         // console.log(data);
        $('.product-grid').append(`<div class="col">
						<div class="card">
							<img src="uploads/products/`+data.prod_image+`" class="card-img-top" alt="...">
							<div class="">
								<div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">-10%</span></div>
							</div>
							<div class="card-body">
								<h6 class="card-title cursor-pointer">`+data.title+`</h6>
								<h6 class="card-title cursor-pointer">Category: `+data.catname+`</h6>
						
								<div class="clearfix">
									<p class="mb-0 float-start"><strong>`+data.description+`</strong> Sales</p>
									
									<p class="mb-0 float-end fw-bold"><span class="me-2 text-decoration-line-through text-secondary">$350</span><span>`+data.sell_price+`</span></p>
								</div>
								<div class="d-flex align-items-center mt-3 fs-6">
								  <div class="cursor-pointer">
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-warning'></i>
									<i class='bx bxs-star text-secondary'></i>
								  </div>	
								  <p class="mb-0 ms-auto">4.2(182)</p>
								  <div class="btn btn-info" data-id="`+data.pro_id+`" type="button" id="edit-button">edit</button>
								</div>
							</div>
						</div>
					</div>`);

        });
		return false;

        }

   });

// modal for edit
$(document).on("click","#edit-button",function(){
            var products_id=$(this).data('id');
						// console.log(products_id);
			$.ajax({			
				url:"function.php",
				type:"POST",
				dataType:"JSON",
                data:{isproductsEdit:true, products_id:products_id},
                success:function(res){
                 $('#productsedit').modal('show');
				 $('.editproductsForm').html(`<form method="post" id="isproductedit">
											<label for="title">product_id</label>
											<input type="text" class="form-control" name="product_id" value="`+res.id+`" id="product_id" placeholder="">
											<div class="form-group">
											</div>
											<label for="title">title</label>
											<input type="text" class="form-control" name="title" value="`+res.title+`" id="title" placeholder="">
											<div class="form-group">
											</div>
											<label for="discription">discription</label>
											<input type="text" class="form-control" name="description" value="`+res.description+`" id="description" placeholder="">
											</div>
											<div class="modal-footer">
											<label for="image">image</label>
										     <img src="uploads/products/`+res.image+`" id="oldimage" data-image="`+res.image+`" class="w-50">
											 <input type="file" class="form-control" name="image"  value=""  id="image" placeholder="">			 
											</div>
											<div class="modal-footer">
											<label for="price">price</label>
											<input type="text" class="form-control" name="price"  value="`+res.sell_price+`"  id="price" placeholder="">
											</div>
											<div class="modal-footer">
								<button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
								<button type="button" id="delete" data-id="`+res.id+`" class="btn btn-danger">Delete </button>
							<button type="submit" id="submit" class="btn btn-dark">Save changes</button>
							</div>
						</form>`);
				
             
                 
                }
            });
            return false;
          });

		  $(document).on("submit","#isproductedit",function(){

			  var formdata = new FormData(this);
				
                formdata.append('isproductsupdate', true);
                formdata.append('product_image',$('#image')[0].files[0]);
                formdata.append('old_image',$('#oldimage').data('image'));
                formdata.append('product_id', $('#product_id').val());
             	formdata.append('title', $('#title').val());
				formdata.append('description', $('#description').val());
				formdata.append('sell_price', $('#price').val());
            
            $.ajax({
                url:"function.php",
                type:"POST",
                dataType:"JSON",
                data:formdata,
				cache: false,
        contentType: false,
        processData: false, 
                success:function(res){
                    if(res.success){
                                               
						
                }
            }
            });
            return false;  
        });

		
		// delete //
		$(document).on("click","#delete",function(){
                var product_id=$(this).data('id');
                

                Swal.fire({
  title: 'Do you want to save the changes?',
  showDenyButton: false,
  showCancelButton: true,
  confirmButtonText: 'Confirm',
  denyButtonText: `Don't save`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    $.ajax({
                url:"function.php",
                type:"POST",
                dataType:"JSON",
                data:{isproductsdelete:true,product_id:product_id},
                success:function(res){ 
                    if(res){

                                
        Swal.fire({
        button: 'yes',
        title: res.success,
        text: 'deleted!',
       
        
        }); 
       setTimeout(() => {
        window.location.href="user.php";
       }, 3000);
        
            
                        }
            
                }
            });
  }
})
                
            // if(confirm("DO YOU WANT TO DELETE THIS?")){
                
               
            return false;
          });
   
      </script>