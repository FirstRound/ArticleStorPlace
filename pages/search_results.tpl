<!-- Start Page Banner -->
		<div class="page-banner no-subtitle">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h2>Search by {{type}}: <i color = "red">"{{word}}"</i>
						</h2>
					</div>
					<div class="col-md-6">
						<ul class="breadcrumbs">
							<li><a href="#">Search</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- End Page Banner -->
		
		
		
		
		<!-- Start Content -->
		<div id="content">
			<div class="container">
				<div class="row sidebar-page">
					
					
					<!-- Page Content -->
					<div class="col-md-9 page-content">
						%for i in vars:
						<!-- START OF ATRICLE -->	
							<div class=" jumbotron call-action call-action-boxed call-action-style1 clearfix">
								<h3 class="primary">
									<h3><b><a class="text-info" href = "index?page=article&id={{i[3]}}">{{i[0]}}</b></h3>
									 <h4>doi: {{i[1]}}</h4>
									 <hr>
									 <h4><a class="text-info" href = "{{i[2]}}" target = "_blank">
									 	Read it: {{i[2]}}</a><h4>
							</div>
							<div class="hr2" style="margin-bottom:40px;"></div>

						<!-- END OF ATRICLE -->	
						%end

						%if (len(vars) == 0):
							<div align="center"><h1>No results</h1></div>
						%else:
						<nav align = "center">
						  <ul class="pagination pagination-lg">
						    <li>
						      <a href="#" aria-label="Previous">
						        <span aria-hidden="true">&laquo;</span>
						      </a>
						    </li>
						    <li><a href="#">1</a></li>
						    <li><a href="#">2</a></li>
						    <li><a href="#">3</a></li>
						    <li><a href="#">4</a></li>
						    <li><a href="#">5</a></li>
						    <li>
						      <a href="#" aria-label="Next">
						        <span aria-hidden="true">&raquo;</span>
						      </a>
						    </li>
						  </ul>
						</nav>
						<!-- Divider -->
						%end
						<div class="hr5" style="margin-top:30px; margin-bottom:45px;"></div>
						
						<!-- End Accordion -->
						
					</div>
					<!-- End Page Content-->
					
					
					