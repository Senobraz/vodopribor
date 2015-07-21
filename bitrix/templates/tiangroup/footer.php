<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
	<? if ( !$isMainPage ) : ?>
				</div><!-- cont-right -->
			</div><!-- cont-wrap -->
		</div> <!-- wrapper -->
	</div><!-- content -->
	<? endif; ?>
<div class="break"></div>		
</div>
<footer>
	<div class="wrapper">
		<a href="/" class="foot-logo">
			<div class="img">			
				<?				
				$APPLICATION->IncludeFile(SITE_DIR."inc_logo_footer.php", Array(), Array(
					"MODE" => "html",                             
					"NAME" => GetMessage("DEF_LOGO"),					
					));
				?>			
			</div>
			<div class="desc">
				<?				
					$APPLICATION->IncludeFile(SITE_DIR."inc_copy.php", Array(), Array(
						"MODE" => "html",                             
						"NAME" => GetMessage("DEF_PHONE"),					
						));
				?>
			</div>
		</a>
		<div class="top-phone">
			<?				
				$APPLICATION->IncludeFile(SITE_DIR."inc_phone.php", Array(), Array(
					"MODE" => "html",                             
					"NAME" => GetMessage("DEF_PHONE"),					
					));
			?>	
		</div>
		<div class="dev">				
			<?= GetMessage("DEF_DEVELOER") ?>
		</div>
	</div>
</footer>
</body>
</html>