<?php
echo "<option>--- Select DJ ---</option>";

				foreach ($arrayToEcho as $item) {
					if(!empty($item)):
						echo "<option>".$item."</option>";
				    endif;
} 
?>