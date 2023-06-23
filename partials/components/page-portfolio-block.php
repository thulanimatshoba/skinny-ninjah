<?php
    $portfolio_blocks = carbon_get_the_post_meta('page_portfolio_block');
    $portfolio_section_title = carbon_get_the_post_meta('section_title');
    $portfolio_section_description = carbon_get_the_post_meta('section_description');
?>
<div class="uk-text-center uk-padding">
    <h2><?= $portfolio_section_title ?></h2>
    <p class="uk-width-1-2 uk-margin-auto"><?= $portfolio_section_description ?></p>
</div>

<div uk-filter="target: .portfolio-grid">
    <ul class="portfolio-links uk-subnav uk-subnav-pill uk-display-block uk-text-center">
        <li class="uk-inline uk-active" uk-filter-control><a href="#">All</a></li>
        <?php
        foreach ($portfolio_blocks as $blocks) :
            $portfolio_category = $blocks['portfolio_category'];
        ?>
            <li id="<?= $portfolio_category ?>" class="uk-inline" uk-filter-control="[data-filter='<?= $portfolio_category ?>']">
                <a href="#"><?= $portfolio_category ?></a>
            </li>
        <?php endforeach; ?>
    </ul>

    <div class="portfolio-grid uk-child-width-1-2 uk-child-width-1-3@m uk-text-center" uk-grid>
        <?php
        foreach ($portfolio_blocks as $blocks) :
            $category_title =  $blocks['category_name'];
            $portfolio_category = $blocks['portfolio_category'];
            $description = $blocks['portfolio_description'];
            $image = wp_get_attachment_image( $blocks['category_image'], 'portfolio-square' );
            ?>
            <div class="category-block" data-filter="<?= $portfolio_category ?>">
                <div class="portfolio-block uk-overflow-hidden uk-card uk-card-default">
                    <?php if (!$image) { ?>
                        <img src="https://picsum.photos/480/320" />
                    <?php } else {
                        echo $image;
                    } ?>
                    <div class="portfolio-content">
                        <h5 class="uk-text-bold"><?= $category_title; ?>
                            <span class="uk-text-light uk-text-muted uk-display-block"><?= $description; ?></span>
                        </h5>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
