<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{asset('backend')}}/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Rukada</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="{{route('admin')}}">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
				
				<li class="menu-label">Products & categories</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="fadeIn animated bx bx-spreadsheet"></i>
						</div>
						<div class="menu-title">Category</div>
					</a>
					<ul>
						<li> <a href="{{route('admin.add-cat')}}"><i class="bx bx-right-arrow-alt"></i>Add Category</a>
						</li>
						<li> <a href="{{route('admin.all-cat')}}"><i class="bx bx-right-arrow-alt"></i>Manage Category</a>
						</li>
						
					</ul>
				</li>

				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="lni lni-tshirt"></i>
						</div>
						<div class="menu-title">Product</div>
					</a>
					<ul>
						<li> <a href="{{route('admin.add-product')}}"><i class="bx bx-right-arrow-alt"></i>Add Product</a>
						</li>
						<li> <a href="table-datatable.html"><i class="bx bx-right-arrow-alt"></i>Manage Product</a>
						</li>
						
					</ul>
				</li>
				
			</ul>
			<!--end navigation-->
		</div>