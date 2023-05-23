<?php
    $portfolio_blocks = carbon_get_the_post_meta('page_portfolio_block');
?>

<div uk-filter="target: .portfolio">

    <ul class="uk-subnav uk-subnav-pill">
        <?php
        foreach ($portfolio_blocks as $blocks) :
            $category =  $blocks['category_name'];
            $portfolio_category = $blocks['portfolio_category'];
            ?>
            <li uk-filter-control="[data-filter='<?= $portfolio_category ?>']">
                <a href="#"><?= $category ?></a>
            </li>

        <?php endforeach; ?>
    </ul>

    <div class="portfolio uk-child-width-1-2 uk-child-width-1-3@m uk-text-center" uk-grid>
        <script>
            let chars = ['web-design', 'web-development', 'running', 'web-design', 'running'];

            let uniqueChars = [];
            chars.forEach((c) => {
                if (!uniqueChars.includes(c)) {
                    uniqueChars.push(c);
                }
            });

            console.log(uniqueChars);
        </script>
        <?php
        foreach ($portfolio_blocks as $blocks) :
            $category =  $blocks['category_name'];
            $portfolio_category = $blocks['portfolio_category'];
            $description = $blocks['portfolio_description'];
            ?>
            <div data-filter="<?= $portfolio_category ?>">
                <div class="uk-card uk-card-default uk-card-body"><?= $description ?></div>
            </div>
        <?php endforeach; ?>
    </div>

</div>