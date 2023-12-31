<?php
defined('ABSPATH') || exit;

/* @var $this NewsletterProfile */

require_once NEWSLETTER_INCLUDES_DIR . '/controls.php';

$controls = new NewsletterControls();

$current_language = $this->get_current_language();

$is_all_languages = $this->is_all_languages();

if (!$is_all_languages) {
    $controls->warnings[] = 'You are configuring the language "<strong>' . $current_language . '</strong>". Switch to "all languages" to see every options.';
}

// Profile options are still inside the main options
if ($controls->is_action()) {
    if ($controls->is_action('save')) {
        $this->save_options($controls->data, '', null, $current_language);
        $controls->add_message_saved();
    }
    if ($controls->is_action('reset')) {
        $this->reset_options();
        $controls->data = $this->get_options('', $current_language);
        $controls->add_message_reset();
    }
} else {
    $controls->data = $this->get_options('', $current_language);
}
?>

<div class="wrap tnp-profile tnp-profile-index" id="tnp-wrap">

    <?php include NEWSLETTER_DIR . '/tnp-header.php'; ?>

    <div id="tnp-heading">
        <?php $controls->title_help('/profile-page') ?>
        <h2><?php _e('The subscriber profile page', 'newsletter') ?></h2>
        <p>Where your subscribers can change their data.</p>
    </div>

    <div id="tnp-body">


        <form id="channel" method="post" action="">
            <?php $controls->init(); ?>
            <div id="tabs">
                <ul>
                    <li><a href="#tabs-general"><?php _e('General', 'newsletter') ?></a></li>
                    <li><a href="#tabs-labels"><?php _e('Messages and labels', 'newsletter') ?></a></li>
                    <li><a href="#tabs-export"><?php _e('Subscriber data export', 'newsletter') ?></a></li>

                </ul>

                <div id="tabs-general">

                    <table class="form-table">

                        <tr>
                            <th><?php _e('Profile page', 'newsletter') ?>
                            </th>
                            <td>
                                <p>
                                    Shown inside the Newsletter dedicated page. Use <code>{profile_form}</code> where you want the data form
                                    be inserted. Create a link with URL <code>{unsubscribe_url}</code> to give access to the cancellation page.
                                </p>
                                <?php $controls->wp_editor('text'); ?>
                            </td>
                        </tr>

                        <tr>
                            <th><?php _e('Alternative URL', 'newsletter') ?></th>
                            <td>
                                <?php $controls->text('url', 70); ?>
                                <p class="description">
                                    The specified page should containt the <code>[newsletter_profile]</code> shortcode to insert the data form.
                                </p>
                            </td>
                        </tr>

                    </table>
                </div>

                <div id="tabs-labels">

                    <table class="form-table">
                        <tr>
                            <th><?php _e('Profile saved', 'newsletter') ?></th>
                            <td>
                                <?php $controls->text('saved', 80); ?>
                            </td>
                        </tr>

                        <tr>
                        <tr>
                            <th><?php _e('Email changed alert', 'newsletter') ?></th>
                            <td>
                                <?php $controls->text('email_changed', 80); ?>
                            </td>
                        </tr>

                        <tr>

                        <tr>
                        <tr>
                            <th><?php _e('General error', 'newsletter') ?></th>
                            <td>
                                <?php $controls->text('error', 80); ?>
                            </td>
                        </tr>

                        <tr>
                            <th><?php _e('"Save" label', 'newsletter') ?></th>
                            <td>
                                <?php $controls->text('save_label'); ?>
                            </td>
                        </tr>

                        <tr>
                            <th><?php _e('Privacy link text', 'newsletter') ?></th>
                            <td>
                                <?php $controls->text('privacy_label', 80); ?>
                                <p class="description">

                                </p>
                            </td>
                        </tr>

                    </table>
                </div>

                <div id="tabs-export">
                    <?php if ($is_all_languages) { ?>

                        <table class="form-table">

                            <tr>
                                <th>
                                    <?php _e('Log of sent newsletters', 'newsletter') ?>
                                </th>
                                <td>
                                    <?php $controls->yesno('export_newsletters'); ?>
                                </td>
                            </tr>
                        </table>
                    <?php } else { ?>

                        <?php $controls->switch_to_all_languages_notice(); ?>

                    <?php } ?>
                </div>

            </div>

            <p>
                <?php $controls->button_save() ?>
                <?php $controls->button_reset() ?>
            </p>

        </form>
    </div>

    <?php include NEWSLETTER_DIR . '/tnp-footer.php'; ?>

</div>
