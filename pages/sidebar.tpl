%import sys
%sys.path.append('..\\')
%from models.user import User


<!--Sidebar-->
					<div class="col-md-3 sidebar right-sidebar">
						

						<!-- Categories Widget -->
						<!-- Accordion -->
						  <div class="panel-group" id="accordion">
						    
						    <!-- Start Accordion 1 -->
						    <div class="panel panel-default">
						      <!-- Toggle Heading -->
						      <div class="panel-heading">
						        <h4 class="panel-title">
						          <a data-toggle="collapse" data-parent="#accordion" href="#collapse-one">
						            <i class="icon-down-open-1 control-icon"></i>
						            <i class="icon-laptop-1"></i> Search by keywords
						        </a>
						    </h4>
						</div>
						<!-- Toggle Content -->
						<div id="collapse-one" class="panel-collapse collapse in">
						    <div class="panel-body">
						    	<div class="widget widget-search">
									<form method = "GET" action="/index?page=articles">
										<input type="hidden" name="page" value="search"/>
										<input type="hidden" name="type" value="keyword"/>
										<input name="value" type="search" placeholder="Enter Keywords..." />
										<button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
									</form>
								</div>
						    </div>
						</div>
						</div>
						<!-- End Accordion 1 -->

						<!-- Start Accordion 2 -->
						<div class="panel panel-default">
						  <!-- Toggle Heading -->
						  <div class="panel-heading">
						    <h4 class="panel-title">
						      <a data-toggle="collapse" data-parent="#accordion" href="#collapse-tow" class="collapsed">
						         <i class="icon-down-open-1 control-icon"></i>
						         <i class="icon-gift-1"></i> Search by authors
						     </a>
						 </h4>
						</div>
						<!-- Toggle Content -->
						<div id="collapse-tow" class="panel-collapse collapse">
						  <div class="panel-body">
					  		<div class="widget widget-search">
								<form method = "GET" action="/index">
									<input type="hidden" name="page" value="search"/>
									<input type="hidden" name="type" value="author"/>
									<input name="value" type="search" placeholder="Enter author..." />
									<button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
								</form>
							</div>
						  </div>
						</div>
						</div>
						<!-- End Accordion 2 -->

						<!-- Start Accordion 3 -->
						<div class="panel panel-default">
						    <!-- Toggle Heading -->
						    <div class="panel-heading">
						      <h4 class="panel-title">
						        <a data-toggle="collapse" data-parent="#accordion" href="#collapse-three" class="collapsed">
						          <i class="icon-down-open-1 control-icon"></i>
						          <i class="icon-tint"></i> Search in conferences
						      </a>
						  </h4>
						</div>
						<!-- Toggle Content -->
						<div id="collapse-three" class="panel-collapse collapse">
						  <div class="panel-body">
					  		<div class="widget widget-search">
								<form method = "GET" action="/index">
									<input type="hidden" name="page" value="search"/>
									<input type="hidden" name="type" value="conference"/>
									<input name="value" type="search" placeholder="Enter conference..." />
									<button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
								</form>
							</div>
						  </div>
						</div>
						</div>
						<!-- End Accordion 3 -->

						</div>
						%if (User.is_login()):
						<!-- Popular Posts widget -->
						<div class="widget widget-popular-posts">
							<h4>Post you rated: <span class="head-line"></span></h4>
							<ul>
								%for i in rated:
								<li>
									<div class="widget-thumb">
										<a href="#"><img src="images/blog-mini-01.jpg" alt="" /></a>
									</div>
									<div class="widget-content">
										<h5><a href="index?page=article&id={{i[1]}}">{{i[0]}}</a></h5>
									</div>
									<div class="clearfix"></div>
								</li>
								%end
							</ul>
						</div>
						
						<!-- Keywords Widget -->
						<div class="widget widget-tags">
							<h4>Popular keywords <span class="head-line"></span></h4>
							<div class="tagcloud">
								%for  i in pop_keys:
								%s = str(i)
								%s = s[2:-3]
								<a href="/index?page=search&type=keyword&value={{s}}">{{s}}</a>
								%end
							</div>
						</div>

					</div>
					<!--End sidebar-->
					
					
				</div>
			</div>
		</div>
		<!-- End Content -->
<!-- Start Content -->
<div id="content">
	<div class="container">
		<div class="row sidebar-page">

		
			</div>
	</div>
</div>
<!-- End Content -->
