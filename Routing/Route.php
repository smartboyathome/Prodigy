<?php
	class Route
	{
		private $Params;
		private $RegexMatcher = "";
		private $DefaultController = NULL;
		private $DefaultAction = NULL;
		private $ViewFunc;
		
		function Route($RouteGroups, $TheParams, $TheViewFunc)
		{
			$this->ViewFunc = $TheViewFunc;
			
			if(array_key_exists('controller', $Params))
			{
				$this->DefaultController = $TheParams['controller'];
			}
			
			if(array_key_exists('action', $Params))
			{
				$this->DefaultAction = $TheParams['action'];
			}
			$this->Params = $TheParams;
			
			$first = true;
            $RegexMatcher += "/";
			foreach($RouteGroups as $RouteGroup)
			{
				if(!first) {
					$this->RegexMatcher += "/";
				}
				
				$CatchAll = false;
				if($RegexGroup[0] == "*")
				{
					$CatchAll = true;
					substr($RegexGroup, 1);
				}
				
				$RegexMatcher += "(?P<" + $RouteGroup;
				if($CatchAll)
				{
					$this->RegexMatcher += ">[\w\d\/]+)";
				}
				else
				{
					$this->RegexMatcher += ">[\w\d]+)";
				}
			}
            $RegexMatcher += "/";
		}
		
		function Matches($Url)
		{
			return preg_match($this->RegexMatcher, $Url);
		}
		
		function Execute()
		{
			$this->ViewFunc();
		}
	}
?>