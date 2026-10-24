<div class="columns-searchbox">
    <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
    <div class="columns-searchbox-set">
        <div class="columns-searchbox-set-item">
            <label for="s">キーワード検索</label>
            <!-- キーワード検索用の入力フィールド -->
            <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="キーワードを入力" />
        </div>
        <div class="columns-searchbox-set-item">
            <label for="column_category">カテゴリー</label>
            <!-- カテゴリー選択用のプルダウンメニュー -->
            <select name="column_category" id="column_category" class="custom-select">
                <option value="">すべてのカテゴリー</option>
                <?php 
                // タクソノミー 'column_category' の一覧を取得し、プルダウンメニューに表示
                $categories = get_terms('column_category');
                foreach ($categories as $category) {
                    echo '<option value="' . $category->slug . '">' . $category->name . '</option>';
                }
                ?>
            </select>
        </div>
    </div>
        <div>
            <!-- 検索ボタン -->
            <div class="input_btn">
            <input type="submit" id="searchsubmit" value="コラムを検索する" />
            </div>
        </div>
        <!-- post_typeを指定する隠しフィールド -->
        <input type="hidden" name="post_type" value="column" />
    </form>
</div>