<?php
class Sponsors_Widget extends WP_Widget
{
    public function __construct()
    {
        $params = [
            'description'   => 'Affiche les partenaires du club',
            'name'          => 'Partenaires'
        ];
        parent::__construct('Sponsors_Widget', '', $params);

        //Insert JS files

        add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
        Asset::add('upload_media_widget', 'js/upload-media.js', ['jquery'], '1.0', true)->to('admin');

    }

    public function upload_scripts()
    {
      wp_enqueue_script('media-upload');
      wp_enqueue_script('thickbox');
      wp_enqueue_style('thickbox');
    }

    public function form( $instance )
    {
         $title = __('Widget Image');
         if(isset($instance['title']))
         {
             $title = $instance['title'];
         }

         $image = '';
         if(isset($instance['image']))
         {
             $image = $instance['image'];
         }
         ?>
         <td class="themosis-field">
     <?php
     }

     public function update( $new_instance, $old_instance ) {
       // update logic goes here
       $updated_instance = $new_instance;
       return $updated_instance;
   }


    public function widget( $args, $instance ) {
      if (! empty($instance['image']))
        echo "<img src='". $instance['image'] ."'>";
        echo "<h3>Partenaire Widget</h3>";
    }
}
?>
