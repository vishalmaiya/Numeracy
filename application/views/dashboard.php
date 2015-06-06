<div id="content-wrapper">
		<ul class="breadcrumb breadcrumb-page">
			<div class="breadcrumb-label text-light-gray">You are here: </div>
			<li><a href="#">Home</a></li>
			<li class="active"><a href="#">Dashboard</a></li>
		</ul>
		<div class="page-header">
			
			<div class="row">
				<!-- Page header, center on small screens -->
				<h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-dashboard page-header-icon"></i>&nbsp;&nbsp;Dashboard</h1>

				<div class="col-xs-12 col-sm-8">
					<div class="row">
						<hr class="visible-xs no-grid-gutter-h">
						<!-- "Create project" button, width=auto on desktops -->
						<div class="pull-right col-xs-12 col-sm-auto"><a href="#" class="btn btn-primary btn-labeled" style="width: 100%;"><span class="btn-label icon fa fa-plus"></span>Add New Test</a></div>

						<!-- Margin -->
						<div class="visible-xs clearfix form-group-margin"></div>

						<!-- Search field -->
						<form action="#" class="pull-right col-xs-12 col-sm-6">
							<div class="input-group no-margin">
								<span class="input-group-addon" style="border:none;background: #fff;background: rgba(0,0,0,.05);"><i class="fa fa-search"></i></span>
								<input type="text" placeholder="Search..." class="form-control no-padding-hr" style="border:none;background: #fff;background: rgba(0,0,0,.05);">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div> <!-- / .page-header -->


		<div class="row">
			<div class="col-md-8">

<!-- 5. $UPLOADS_CHART =============================================================================

				Uploads chart
-->
				<!-- Javascript -->
				<script>
					init.push(function () {
						var uploads_data = [
							{ day: '2014-03-10', v: 20 },
							{ day: '2014-03-11', v: 10 },
							{ day: '2014-03-12', v: 15 },
							{ day: '2014-03-13', v: 12 },
							{ day: '2014-03-14', v: 5  },
							{ day: '2014-03-15', v: 5  },
							{ day: '2014-03-16', v: 20 }
						];
						Morris.Line({
							element: 'hero-graph',
							data: uploads_data,
							xkey: 'day',
							ykeys: ['v'],
							labels: ['Value'],
							lineColors: ['#fff'],
							lineWidth: 2,
							pointSize: 4,
							gridLineColor: 'rgba(255,255,255,.5)',
							resize: true,
							gridTextColor: '#fff',
							xLabels: "day",
							xLabelFormat: function(d) {
								return ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov', 'Dec'][d.getMonth()] + ' ' + d.getDate(); 
							},
						});
					});
				</script>
				<!-- / Javascript -->

				<div class="stat-panel">
					<div class="stat-row">
						<!-- Small horizontal padding, bordered, without right border, top aligned text -->
						<div class="stat-cell col-sm-4 padding-sm-hr bordered no-border-r valign-top">
							<!-- Small padding, without top padding, extra small horizontal padding -->
							<h4 class="padding-sm no-padding-t padding-xs-hr"><i class="fa fa-cloud-upload text-primary"></i>&nbsp;&nbsp;Test Data</h4>
							<!-- Without margin -->
							<ul class="list-group no-margin">
								<!-- Without left and right borders, extra small horizontal padding, without background, no border radius -->
								<li class="list-group-item no-border-hr padding-xs-hr no-bg no-border-radius">
									Questions Banks <span class="label label-pa-purple pull-right">9</span>
								</li> <!-- / .list-group-item -->
								<!-- Without left and right borders, extra small horizontal padding, without background -->
								<li class="list-group-item no-border-hr padding-xs-hr no-bg">
									Test <span class="label label-danger pull-right">3</span>
								</li> <!-- / .list-group-item -->
								<!-- Without left and right borders, without bottom border, extra small horizontal padding, without background -->
								<li class="list-group-item no-border-hr no-border-b padding-xs-hr no-bg">
									Test Submitted <span class="label label-success pull-right">12</span>
								</li> <!-- / .list-group-item -->
							</ul>
						</div> <!-- /.stat-cell -->
						<!-- Primary background, small padding, vertically centered text -->
						<div class="stat-cell col-sm-8 bg-primary padding-sm valign-middle">
							<div id="hero-graph" class="graph" style="height: 230px;"><svg height="230" version="1.1" width="442" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.1.2</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="26.5" y="191" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#ffffff" d="M39,191H417" stroke-opacity="0.5" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="26.5" y="149.5" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">5</tspan></text><path fill="none" stroke="#ffffff" d="M39,149.5H417" stroke-opacity="0.5" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="26.5" y="108" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">10</tspan></text><path fill="none" stroke="#ffffff" d="M39,108H417" stroke-opacity="0.5" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="26.5" y="66.49999999999999" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan dy="3.999999999999986" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">15</tspan></text><path fill="none" stroke="#ffffff" d="M39,66.49999999999999H417" stroke-opacity="0.5" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="26.5" y="25" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">20</tspan></text><path fill="none" stroke="#ffffff" d="M39,25H417" stroke-opacity="0.5" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="417" y="203.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Mar 16</tspan></text><text x="354" y="203.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Mar 15</tspan></text><text x="291" y="203.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Mar 14</tspan></text><text x="228" y="203.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Mar 13</tspan></text><text x="165" y="203.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Mar 12</tspan></text><text x="102" y="203.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Mar 11</tspan></text><text x="39" y="203.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Mar 10</tspan></text><path fill="none" stroke="#ffffff" d="M39,25C54.75,45.75,86.25,102.8125,102,108C117.75,113.1875,149.25,68.57499999999999,165,66.49999999999999C180.75,64.42499999999998,212.25,81.02499999999999,228,91.39999999999999C243.75,101.77499999999999,275.25,142.2375,291,149.5C306.75,156.7625,338.25,165.0625,354,149.5C369.75,133.9375,401.25,56.125,417,25" stroke-width="2" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="39" cy="25" r="4" fill="#ffffff" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="102" cy="108" r="7" fill="#ffffff" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="165" cy="66.49999999999999" r="4" fill="#ffffff" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="228" cy="91.39999999999999" r="4" fill="#ffffff" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="291" cy="149.5" r="4" fill="#ffffff" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="354" cy="149.5" r="4" fill="#ffffff" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="417" cy="25" r="4" fill="#ffffff" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="left: 63.5px; top: 50px;"><div class="morris-hover-row-label">2014-03-11</div><div class="morris-hover-point" style="color: #fff">
  Value:
  10
</div></div></div>
						</div>
					</div>
				</div> <!-- /.stat-panel -->
<!-- /5. $UPLOADS_CHART -->

<!-- 6. $EASY_PIE_CHARTS ===========================================================================

				Easy Pie charts
-->
				<!-- Javascript -->
				<script>
					init.push(function () {
						// Easy Pie Charts
						var easyPieChartDefaults = {
							animate: 2000,
							scaleColor: false,
							lineWidth: 6,
							lineCap: 'square',
							size: 90,
							trackColor: '#e5e5e5'
						}
						$('#easy-pie-chart-1').easyPieChart($.extend({}, easyPieChartDefaults, {
							barColor: LanderApp.settings.consts.COLORS[1]
						}));
						$('#easy-pie-chart-2').easyPieChart($.extend({}, easyPieChartDefaults, {
							barColor: LanderApp.settings.consts.COLORS[1]
						}));
						$('#easy-pie-chart-3').easyPieChart($.extend({}, easyPieChartDefaults, {
							barColor: LanderApp.settings.consts.COLORS[1]
						}));
					});
				</script>
				<!-- / Javascript -->

				
			</div>
<!-- /6. $EASY_PIE_CHARTS -->

			<div class="col-md-4">
				<div class="row">

<!-- 7. $EARNED_TODAY_STAT_PANEL ===================================================================

					Earned today stat panel
-->
					<div class="col-sm-4 col-md-12">
						<div class="stat-panel">
							<!-- Danger background, vertically centered text -->
							<div class="stat-cell bg-danger valign-middle">
								<!-- Stat panel bg icon -->
								<i class="fa fa-trophy bg-icon"></i>
								<!-- Extra large text -->
								<span class="text-xlg"><span class="text-lg text-slim"></span><strong></strong>Results</span><br>
								<!-- Big text -->
								<span class="text-bg"> today</span><br>
								<!-- Small text -->
								<span class="text-sm"><a href="#">See details in Results</a></span>
							</div> <!-- /.stat-cell -->
						</div> <!-- /.stat-panel -->
					</div>
<!-- /7. $EARNED_TODAY_STAT_PANEL -->


<!-- 8. $RETWEETS_GRAPH_STAT_PANEL =================================================================

					Retweets graph stat panel
-->
					<div class="col-sm-4 col-md-12">
						<!-- Javascript -->
						<script>
							init.push(function () {
								$("#stats-sparklines-3").pixelSparkline([275,490,397,487,339,403,402,312,300], {
									type: 'line',
									width: '100%',
									height: '45px',
									fillColor: '',
									lineColor: '#fff',
									lineWidth: 2,
									spotColor: '#ffffff',
									minSpotColor: '#ffffff',
									maxSpotColor: '#ffffff',
									highlightSpotColor: '#ffffff',
									highlightLineColor: '#ffffff',
									spotRadius: 4,
									highlightLineColor: '#ffffff'
								});
							});
						</script>
						<!-- / Javascript -->

						<div class="stat-panel">
							<div class="stat-row">
								<!-- Purple background, small padding -->
								<div class="stat-cell bg-pa-purple padding-sm">
									<!-- Extra small text -->
									<div class="text-xs" style="margin-bottom: 5px;">RETWEETS GRAPH</div>
									<div class="stats-sparklines" id="stats-sparklines-3" style="width: 100%"><canvas width="313" height="45" style="display: inline-block; width: 313px; height: 45px; vertical-align: top;"></canvas></div>
								</div>
							</div> <!-- /.stat-row -->
							<div class="stat-row">
								<!-- Bordered, without top border, horizontally centered text -->
								<div class="stat-counters bordered no-border-t text-center">
									<!-- Small padding, without horizontal padding -->
									<div class="stat-cell col-xs-4 padding-sm no-padding-hr">
										<!-- Big text -->
										<span class="text-bg"><strong>312</strong></span><br>
										<!-- Extra small text -->
										<span class="text-xs text-muted">True</span>
									</div>
									<!-- Small padding, without horizontal padding -->
									<div class="stat-cell col-xs-4 padding-sm no-padding-hr">
										<!-- Big text -->
										<span class="text-bg"><strong>1000</strong></span><br>
										<!-- Extra small text -->
										<span class="text-xs text-muted">False</span>
									</div>
									<!-- Small padding, without horizontal padding -->
									<div class="stat-cell col-xs-4 padding-sm no-padding-hr">
										<!-- Big text -->
										<span class="text-bg"><strong>523</strong></span><br>
										<!-- Extra small text -->
										<span class="text-xs text-muted">Not Sure</span>
									</div>
								</div> <!-- /.stat-counters -->
							</div> <!-- /.stat-row -->
						</div> <!-- /.stat-panel -->
					</div>
<!-- /8. $RETWEETS_GRAPH_STAT_PANEL -->

<!-- 9. $UNIQUE_VISITORS_STAT_PANEL ================================================================

					Unique visitors stat panel
-->
					<div class="col-sm-4 col-md-12">
						<!-- Javascript -->
						<script>
							init.push(function () {
								$("#stats-sparklines-2").pixelSparkline(
									[275,490,397,487,339,403,402,312,300,294,411,367,319,416,355,416,371,479,279,361,312,269,402,327,474,422,375,283,384,372], {
									type: 'bar',
									height: '36px',
									width: '100%',
									barSpacing: 2,
									zeroAxis: false,
									barColor: '#ffffff'
								});
							});
						</script>
						<!-- / Javascript -->

						<div class="stat-panel">
							<div class="stat-row">
								<!-- Warning background -->
								<div class="stat-cell bg-warning">
									<!-- Big text -->
									<span class="text-bg">11% more</span><br>
									<!-- Small text -->
									<span class="text-sm">Unique visitors today</span>
								</div>
							</div> <!-- /.stat-row -->
							<div class="stat-row">
								<!-- Warning background, small padding, without top padding, horizontally centered text -->
								<div class="stat-cell bg-warning padding-sm no-padding-t text-center">
									<div id="stats-sparklines-2" class="stats-sparklines" style="width: 100%"><canvas width="298" height="36" style="display: inline-block; width: 298px; height: 36px; vertical-align: top;"></canvas></div>
								</div>
							</div> <!-- /.stat-row -->
						</div> <!-- /.stat-panel -->
					</div>
				</div>
			</div>
		</div>
<!-- /9. $UNIQUE_VISITORS_STAT_PANEL -->

		<!-- Page wide horizontal line -->
		<hr class="no-grid-gutter-h grid-gutter-margin-b no-margin-t">
