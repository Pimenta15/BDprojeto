<h1 class="text-3xl font-bold mb-6"><?php echo $title; ?></h1>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
    <?php foreach ($sections as $section): ?>
        <a href="<?php echo base_url($section['href']); ?>" class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
            <h2 class="text-xl font-semibold mb-2"><?php echo $section['title']; ?></h2>
            <p class="text-gray-600"><?php echo $section['description']; ?></p>
        </a>
    <?php endforeach; ?>
</div>