<?php
	class RouteCollection
	{
		private $RouteArray;
		private $RouteCount;
		
		function RouteCollection()
		{
			$RouteArray = array();
			$RouteCount = 0;
		}
		
		function AddRoute($UrlMatcher, $Params, $ViewFunc)
		{
			if(!is_string($UrlMatcher))
			{
				throw new Exception('$UrlMatcher is not a string.');
			}
			if(!is_array($Params))
			{
				throw new Exception('$Params is not an array.');
			}
			if(!array_key_exists('controller', $Params) && strpos($UrlMatcher, '{controller}') === false)
			{
				throw new Exception('Controller not found.');
			}
			if(!array_key_exists('action', $Params) && strpos($UrlMatcher, '{action}') === false)
			{
				throw new Exception('Action not found.');
			}
			
			// Regular expression for parsing url "Class/Test" from route expression "{controller}/{action}" (for example):
			// (?P<controller>[\w\d]+)/(?P<action>[\w\d]+) where ?P<controller> is a named capture group.
			// Regular expression for parsing url "{controller}/{action}/{param1}/{*param2}":
			// \{([*]?[\w\d]+)\}
			// Outputs into ParamArray ["controller", "action", "param1", "*param2"]
			
			$ParamArray = array();
			$RouteRegex = "/\{([*]?[\w\d]+)\}/";
			preg_match_all($RouteRegex, $UrlMatcher, $ParamArray, PREG_SET_ORDER);
			$RouteArray[] = new Route($ParamArray, $DefaultController, $DefaultAction, $ViewFunc);
		}
		
        function HasMatchingRoute($Url)
        {
            foreach($RouteArray as $TheRoute)
			{
				if($TheRoute.Match($Url))
				{
					return true;
				}
			}
            return false;
        }
        
		function FindRoute($Url)
		{
			$FoundRoute = NULL;
			foreach($RouteArray as $TheRoute)
			{
				if($TheRoute.Match($Url))
				{
					$FoundRoute = $TheRoute;
					break;
				}
			}
			$FoundRoute->Execute();
		}
        
        function IsEmpty()
        {
            return $RouteCount == 0 && empty($RouteArray);
        }
	}
?>