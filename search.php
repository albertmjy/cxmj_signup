<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title></title>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/search.css" />
		<script type="text/javascript" src="js/angular.min.js" ></script>
		<!--<script type="text/javascript" src="js/angular-animate.js" ></script>-->
		
	</head>

	<body ng-app='search'>
		
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="#">
		      	<!--<img class="logo" src="img/getheadimg.jpeg" alt="logo" />-->
		      	
		      </a>
		    </div>
		  </div>
		</nav>
		
		<!--ngnavCtrl-->
		<div ng-controller='ngnavCtrl'>
			<!-- filter -->
			<div class="filter-nav">
				<div class="glass-pane" ng-show='showDetails'>
					<div class="glass" ng-click='hideSearch()'></div>
					<div class="disp-pane">
						<form class="form">
							<label>产品名称</label>
							<input type="text" class="form-control" ng-model='prod_name' />
							<label>品牌</label>
							<input type="text" class="form-control" ng-model='brand' />
							<label>年份</label>
							<div >
								<label class="label label-default" ng-name='prod_year' ng-model='prod_year' ng-repeat='x in years' ng-init='ngClass' ng-click='toggleFilterItem(this, "prod_year")' ng-class='ngClass'>{{x}}年</label>
							</div>
							<label>工艺</label>
							<div ng-init='tech=["raw", "ripe"]'>
								<!--<input type="button" class="btn btn-default" ng-model='technic' ng-repeat='x in tech' ng-init='ngClass' ng-click='toggleFilterItem(this)' ng-class='ngClass' value="xxx" />-->
								<label class="label label-default" ng-repeat='x in tech' ng-init='ngClass' ng-click='toggleFilterItem(this, "technic")' ng-class='ngClass'>{{x=="raw"?"生":"熟"}}</label>
								
							</div>
							<label>重量（克）</label>
							<input type="text" class="form-control" name="weight" ng-model='weight' placeholder="例：357" value="" />
							<label>价格</label>
							<div class="price-row">
								<input type="text" class="form-control price" ng-model='price_low' placeholder="最低价" />
								<span> - </span>
								<input type="text" class="form-control price" ng-model='price_high' placeholder="最高价" />
							</div>
							
							
							<!--button group-->
							<div class="btn-group btn-group-justified fixed-bottom" role="group" aria-label="...">
							  <div class="btn-group" role="group">
							    <button type="button" class="btn btn-info">Reset</button>
							  </div>
							  <div class="btn-group" role="group">
							    <button type="button" class="btn btn-primary" ng-click="submitFilter()">Done</button>
							  </div>
							</div>
						</form>
						
					</div>
				</div>
				<span>Filter</span>
				<span class="glyphicon glyphicon-filter" ng-click="showSearch()"></span>
			</div>
			<!--filter end-->
			<section class="container-fluid" >
				<div >
					<div ng-show='imgloadingshow' class="img-loading"><img src="img/loading-2.gif" /></div>
					
					<!--<div ng-include="'view/search-result-table.html'"></div>-->
					<!--<div ng-include="'view/search-result-list.html'"></div>-->
					
					<div result-list></div>
				</div>
				
				
				<!--test -->
				<div ng-app="myApp" scroll id="page" ng-class="{min:boolChangeClass}">
					g
				</div>
				<div ng-click='doit($event)'>
					click me
				</div>
				
			</section>
		</div>
		<!-- ng-nav end-->
		
		<footer>
			<nav class="navbar">
				<hr />
			  <p>&copy; 2015 Company, Inc.</p>
		</nav>
		</footer>
		
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		
		<script type="text/javascript" src="js/search.js" ></script>
	</body>

</html>