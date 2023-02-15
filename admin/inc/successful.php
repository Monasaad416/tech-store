				<?php if ($session->has_session("success")) : ?>
				    <div class="alert alert-success">
				       <p><?= $session->get_session("success"); ?></p>
                         <?php $session->remove_session("success");?>
				    </div>
				<?php endif; ?>