<?php

function pc_render_block() {
    ob_start(); ?>
    <div class="pincode-checker-block">
        <input type="text" class="pincode-input" placeholder="Enter your pincode" />
        <button class="pincode-submit">Check</button>
        <p class="pincode-message"></p>
    </div>
    <?php
    return ob_get_clean();
}



