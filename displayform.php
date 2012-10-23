		<fieldset class="countdowner">
				<legend>Fields for entry <?php echo $x; ?> on your countdown. </legend>
				 	<div class="itembox">
				 	<label for="top10_title<?php echo $x; ?>">Title</label>
					<input class="big"  type="text" id="top10_title<?php echo $x; ?>" name="top10_title<?php echo $x; ?>" 
					value="<?php 
					$variablename	=	"top10_title". $x;	
					echo ${$variablename}; 
					?>"/>
					</div>
				 	<div class="itembox">
				 	<label for="top10_link<?php echo $x; ?>">Link to Entry</label>
					<input class="big"  type="text" id="top10_link<?php echo $x; ?>" name="top10_link<?php echo $x; ?>"
					value="<?php 
					$variablename	=	"top10_link". $x;	
					echo ${$variablename}; 
					?>"/>
					</div>
				 	<div class="itembox">
				 	<label for="top10_subtitle<?php echo $x; ?>">Subtitle</label>
					<input class="big"  type="text" id="top10_subtitle<?php echo $x; ?>" name="top10_subtitle<?php echo $x; ?>" 
					value="<?php 
					$variablename	=	"top10_subtitle". $x;	
					echo ${$variablename}; 
					?>"/>
					</div>
					<div class="itembox">
					<label for="top10_description<?php echo $x; ?>">Description</label>
					<textarea class="bigtext" id="top10_description<?php echo $x; ?>" name="top10_description<?php echo $x; ?>"><?php 
					$variablename	=	"top10_description". $x;	
					echo ${$variablename}; 
					?></textarea>
					</div>
					<table>
						<tr>
							<td>
								<label for="top10_lastweek<?php echo $x; ?>">Last Wk</label>
								<input class="small"  type="text" id="top10_lastweek<?php echo $x; ?>" name="top10_lastweek<?php echo $x; ?>" 
								value="<?php 
								$variablename	=	"top10_lastweek". $x;	
								echo ${$variablename}; ?>"/>	
							</td>
							<td>
								<label for="top10_2week<?php echo $x; ?>">2 wks</label>
								<input class="small"  type="text" id="top10_2week<?php echo $x; ?>" name="top10_2week<?php echo $x; ?>" 
								value="<?php 
								$variablename	=	"top10_2week". $x;	
								echo ${$variablename}; ?>"/>	
							</td>
						</tr>
						<tr>
							<td>
								<label for="top10_mover<?php echo $x; ?>">Fast Mover</label>
								<input class="small"  type="text" id="top10_mover<?php echo $x; ?>" name="top10_mover<?php echo $x; ?>" 
								value="<?php 
								$variablename	=	"top10_mover". $x;	
								echo ${$variablename}; ?>"/>	
							</td>
							<td>
								<label for="top10_debut<?php echo $x; ?>">Big Debut</label>
								<input class="small"  type="text" id="top10_debut<?php echo $x; ?>" name="top10_debut<?php echo $x; ?>" 
								value="<?php 
								$variablename	=	"top10_debut". $x;	
								echo ${$variablename}; ?>"/>	
							</td>
						</tr>
					</table>			
	</fieldset>