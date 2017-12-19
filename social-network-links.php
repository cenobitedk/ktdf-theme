<div class="icons"><ul class="social">
<?php
global $foxhound_options;
for ( $i = 1; $i <= 6; $i++ ) {	
	// Social Link $i
	if ( false != $foxhound_options['social_link_' . $i . '_profile'] && $foxhound_options['social_link_' . $i . '_url'] ) {
		?>
		<li class="fadein <?php echo $foxhound_options['social_link_' . $i . '_profile']; ?>"><a target="_blank" href="<?php echo esc_url( $foxhound_options['social_link_' . $i . '_url'] ); ?>"><?php echo $foxhound_options['social_link_' . $i . '_profile']; ?></a></li>
		<?php
	}
}
if ( false != $foxhound_options['link_love'] ) {
	?>
	<li class="fadein foxhound"><a target="_blank" href="http://www.foxhoundbandthemes.com/">Foxhound</a></li>
	<?php
}
?>
</ul></div>