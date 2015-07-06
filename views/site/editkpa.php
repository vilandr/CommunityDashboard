<div class="editKPA">
	<h2> Edit <?php echo $kpa->Title?></h2>
		<form action="<?php echo URL; ?>site/updatekpa" method="POST">
			<label>Title</label>
            <input autofocus type="text" name="title" value="<?php echo htmlspecialchars($kpa->Title, ENT_QUOTES, 'UTF-8'); ?>" required />
            
            <label>Description</label>
            <input type="text" name="description" value="<?php echo htmlspecialchars($kpa->Description, ENT_QUOTES, 'UTF-8'); ?>" required />

            <input type="hidden" name="id" value="<?php echo htmlspecialchars($kpa->ID, ENT_QUOTES, 'UTF-8'); ?>" />

            <input type="submit" name="submit_edit_kpa" value="Update" />
        </form>
</div>