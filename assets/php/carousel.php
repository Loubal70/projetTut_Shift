<?php

function carroussel( $photos = [] , $options = [], $videos = [] ){
    $html = '<div class="content position-relative">';
      $html .= '<div class="owl-carousel owl-theme">';
          $nbr = count($photos) + count($videos);
          if (!empty($videos)) {
            foreach ($videos as $video) {
              $html.= '<div class="item-video">';
                $html.='<a class="colorbox owl-video" data-gallery="colorbox-1" href="'.$video['url'].'" title="'.$video['credit']." - ".$video['titre'].'"></a>';

                if ( isset($options['show_title']) && $options['show_title'] == true ) {
                  $html.='<div class="item-caption">';
                      $html.='<p>'.$video['credit'].' - '.$video['titre'].'</p>';
                  $html.='</div>';
                }

              $html.='</div>';

            }


          }

         if(!empty($photos)){
            foreach ($photos as $photo){
              $html.= '<div class="item">';
                $html.='<img src="'. $photo['url'] .'" class="img-fluid" alt="'.$photo['credit'] .'">';

                if ( isset($options['show_title']) && $options['show_title'] == true ) {
                  $html.='<div class="item-caption">';
                      $html.='<p>'.$photo['credit'].' - '.$photo['titre'].'</p>';
                  $html.='</div>';
                }

              $html.='</div>';

            }
          }
      $html .= '</div>';
      // Afficher count

      if ( empty($videos) ) {
        $type_file = "photos";
      }
      else {
        $type_file = "médias";
      }

      // $html .= '<a class="btn-light colorbox_button">Voir les '. $nbr ." ". $type_file.'</a>';
    $html .= '</div>';

    return $html;//.$get_title_and_credit
}



 ?>
