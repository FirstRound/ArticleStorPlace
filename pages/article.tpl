<!-- Start Page Banner -->
		<div class="page-banner no-subtitle">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h2 style="color: red">Article</h2>
					</div>
					<div class="col-md-6">
						<ul class="breadcrumbs">
							<li><a href="#">Article</a></li>
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
					
					%article = var.getValues()
					<!-- Page Content -->
					<div class="col-md-9 page-content">
						<!-- START OF ATRICLE -->	
							<div class=" jumbotron call-action call-action-boxed call-action-style1 clearfix">
								<h3 class="primary">
									<h3 class="text-info"><b>{{article["title"]}}</b></h3>
									 <h4>doi: {{article["doi"]}}</h4>
									 <hr>
									 <h4><b>Authors:</b></h4>
									 <h5><i>
									 	%for i in article["authors"]:
									 		%s = str(i)[2:-3]
									 		<a class="text-primary" href="index?page=search&type=author&value={{s}}">
									 		{{s}}
									 		</a>,
									 	%end
									 </i></h5>
									 <h4><b>Keywords:<b></h4>
									 <h5><i>
									 	%for i in article["keywords"]:
									 		%s = str(i)[2:-3]
									 		<a class="text-primary" href = "index?page=search&type=keyword&value={{s}}">
									 		{{s}}
									 		</a>,
									 	%end
									 </i/><h5>
									 <hr>
									 <h4><a class="text-info" href = "{{article["pdf"]}}" target = "_blank">
									 	Read it: {{article["pdf"]}}</a><h4>

							<div>
							<hr>
							%if (rate == None):
							<h5>Rate this article</h5>
							<form method="post">
							<input id="art-rate" class="rating" data-min="0" data-max="5" data-step="0.5" data-stars=5 
	    						data-glyphicon="false" data-size="xs" name="rating">
	    					<br>
	    					<input type="submit" class="btn btn-sm btn-primary" />
	    					</form>
	    					%else:
	    						%s = float(rate[0])/2.0
	    					
	    					<input disabled id="art-rate" class="rating" data-min="0" data-max="5" data-step="0.5" data-stars=5 
	    						data-glyphicon="false" value={{s}} data-size="xs" name="rating">
	    					%end
							</div>

							</div>
							<hr>
							<div  align = "center"><h1>Similar:</h1></div>
							<hr>

							%sim = article["similar"]
							%for i in sim:
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

							%if (len(sim) == 0):
								<div align="center"><h1>No similar atricles</h1></div>
							%end

							<div class="hr2" style="margin-bottom:40px;"></div>

						<!-- END OF ATRICLE -->	

						<!-- Divider -->
						<div class="hr5" style="margin-top:30px; margin-bottom:45px;"></div>
						
						<!-- End Accordion -->
						
					</div>
					<!-- End Page Content-->
					
					
					