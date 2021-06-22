<?php

/**
 * Bootstrap 4 Library
 * 
 * @author Febriansyah Riki Setiadi <febryars33@gmail.com>
 * @license MIT
 */
class BootstrapCSS
{

    /**
     * Bootstrap 4 Alert CSS Class Function
     *
     * @link https://getbootstrap.com/docs/4.6/components/alerts/
     * @param string $color
     * @param string $message
     * @param boolean $dismissing
     * @return string
     */
    public function alert(string $color = 'light', string $message, bool $dismissing = false): string
    {
        /**
         * Alert HTML
         * 
         * @var string
         */
        $alert_html = '<div class="alert alert-' . $color . '" role="alert">' . $message . '</div>';

        // if $dismissing true
        if ($dismissing == true) {

            /**
             * Alert HTML With Dismissing
             * 
             * @var string
             */
            $alert_html = '<div class="alert alert-' . $color . ' alert-dismissible fade show" role="alert">' . $message . '<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button></div>';
        }
        switch ($color) {
            case 'primary':
                $alert = $alert_html;
                break;

            case 'secondary':
                $alert = $alert_html;
                break;

            case 'success':
                $alert = $alert_html;
                break;

            case 'danger':
                $alert = $alert_html;
                break;

            case 'warning':
                $alert = $alert_html;
                break;

            case 'info':
                $alert = $alert_html;
                break;

            case 'light':
                $alert = $alert_html;
                break;

            case 'dark':
                $alert = $alert_html;
                break;

            default:
                return 'Error: bootstrap alert library';
                break;
        }
        return $alert;
    }
}
