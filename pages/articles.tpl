<!-- Start Page Banner -->
		<div class="page-banner no-subtitle">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h2 style="color: red">Article Storage</h2>
					</div>
					<div class="col-md-6">
						<ul class="breadcrumbs">
							<li><a href="#">Article</a></li>
							<li>All</li>
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
						%i[0].encode('ascii', 'ignore')
						%i[1].encode('ascii', 'ignore')
						%i[2].encode('ascii', 'ignore')
						%i[3].encode('ascii', 'ignore')
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

						<nav align = "center">
						  <ul class="pagination pagination-lg">
						    <li>
						    	%if (int(tab) > 0):
						      <a href="index?page=articles&tab={{int(tab)-1}}" aria-label="Previous">
						        <span aria-hidden="true">&laquo;</span>
						      </a>
						      	%end
						    	%if (int(tab) < 100):
						      <a href="index?page=articles&tab={{int(tab)+1}}" aria-label="Next">
						        <span aria-hidden="true">&raquo;</span>
						      </a>
						      	%end
						    </li>
						  </ul>
						</nav>
						<!-- Divider -->
						<div class="hr5" style="margin-top:30px; margin-bottom:45px;"></div>
						
						<!-- End Accordion -->
						
					</div>
					<!-- End Page Content-->
					
					
					