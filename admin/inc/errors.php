				<?php if ($session->has_session("errors")) : ?>
				    <div class="alert alert-danger">
				        <?php foreach ($session->get_session("errors") as $err) : ?>
				            <p><?= $err; ?></p>

				        <?php endforeach;
                        $session->remove_session("errors"); ?>
				    </div>
				<?php endif; ?>