<?php
$Coordinates="";
$cnt=0;
?>
<!DOCTYPE html>
<html>
<head>
<title>SIL GPS Tracker</title>
<meta charset=UTF-8>
<meta name=description content="About Softland India Limited">
<meta name=keywords content="About Softland India Limited,Vision,Certifications,Hierarchy,Team,Careers,LifeCycle,FacilitiesExpertise,Directors,Milestones">
<meta name=viewport content="width=device-width, initial-scale=1" />
<style>html,body,#map-canvas{height:100%;margin:0;padding:0}</style>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<?php
	
		$loc_date=$_REQUEST['date'];
		$device=$_REQUEST['id'];
		
		mysql_connect("192.168.0.1","Win","root");
		mysql_select_db("sms");
		
		//$sql="select loc_time as `name`, machine_id as `desc`,lat as latitude, lng as longitude 
             //  from coordinates 
              // where loc_date ='$loc_date' and machine_id='$device'
             //  order by loc_time asc;";
                $sql="SELECT `Latitude` as latitude,`Longitude` as longitude , 3956 * 2 * ASIN(SQRT( POWER(SIN((8.5553505 - `Latitude`) * PI()/180 / 2), 2) + COS(8.5553505 * PI()/180) * 
COS(`Latitude` * PI()/180) *POWER(SIN((76.8669555 - `Longitude`) * PI()/180 / 2), 2) )) AS distance FROM 
`location` a GROUP BY `Location_Id` HAVING distance <= 500 ORDER BY distance ";
		$res=mysql_query($sql);
		$count=mysql_num_rows($res);
		if($count>0)
		{
			$i=0;
			while($row = mysql_fetch_assoc($res))
			{
				$latitude=$row['latitude'];
				$longitude=$row['longitude']; 
				//<script>flightPlanCoordinates= [new google.maps.LatLng(<?php echo "$latitude,$longitude" )]; </script> ;
				$Coordinates[$i]="$latitude,$longitude";
				$i++;
				
			}

		}
	?>
<script>function initialize(){var e={zoom:14,center:new google.maps.LatLng(<?php echo $Coordinates[$count-1] ?>),mapTypeId:google.maps.MapTypeId.ROADMAP};var b=new google.maps.Map(document.getElementById("map-canvas"),e);var f="images/map_marker.png";var g=new google.maps.Marker({position:new google.maps.LatLng(<?php echo $Coordinates[$count-1] ?>),map:b,title:"Your are here :)",icon:f,animation:google.maps.Animation.DROP});google.maps.event.addListener(g,"click",a);var k=[new google.maps.LatLng(<?php echo $Coordinates[0] ?>)];function a(){if(g.getAnimation()!=null){g.setAnimation(null)}else{g.setAnimation(google.maps.Animation.BOUNCE)}}<?php
  for($i=0;$i<$count;$i++)
  {
  ?>k.push(new google.maps.LatLng(<?php echo $Coordinates[$i] ?>));<?php
  } ?>var j=new google.maps.Polyline({path:k,geodesic:true,strokeColor:"#FF0000",strokeOpacity:1,strokeWeight:2});j.setMap(b)}google.maps.event.addDomListener(window,"load",initialize);</script>
</head>
<body>
<div id=map-canvas></div>
</body>
</html>