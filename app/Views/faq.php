
<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>

<main>
    <div class="container my-5">
        <h2 class="text-center mb-4">Frequently Asked Questions (FAQ)</h2>
        
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <?php foreach ($faq as $index => $data): ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading<?= $data['id']; ?>">
                        <button class="accordion-button <?= ($index == 0) ? '' : 'collapsed'; ?>" 
                                type="button" 
                                data-bs-toggle="collapse" 
                                data-bs-target="#collapse<?= $data['id']; ?>" 
                                aria-expanded="<?= ($index == 0) ? 'true' : 'false'; ?>" 
                                aria-controls="collapse<?= $data['id']; ?>">
                            <strong><?= $data['pertanyaan']; ?></strong>
                        </button>
                    </h2>
                    <div id="collapse<?= $data['id']; ?>" 
                         class="accordion-collapse collapse <?= ($index == 0) ? 'show' : ''; ?>" 
                         aria-labelledby="heading<?= $data['id']; ?>" 
                         data-bs-parent="#accordionPanelsStayOpenExample">
                        <div class="accordion-body">
                            <?= $data['jawaban']; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>


    <?= $this->endSection(); ?>