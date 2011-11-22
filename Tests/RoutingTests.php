<?php

    require_once('../Routing/RouteCollection.php');
    require_once('../Routing/Route.php');
    require_once('SimpleTest/autorun.php');
    
    class TestOfRouting extends UnitTestCase
    {
        function ViewFunction()
        {
            // It does nothing! Amazing!
        }
    
        function testRouteCollectionCreation()
        {
            $Routes = new RouteCollection();
            $this->assertTrue($Routes->IsEmpty());
        }
        
        function testAddRouteToCollection()
        {
            $Routes = new RouteCollection();
            $Routes->AddRoute("{controller}/{action}/{param1}/{*param2}", array(), $this->ViewFunction);
            $this->assertTrue($Routes->HasMatchingRoute("A/B/C/D/E"));
        }
    }

?>