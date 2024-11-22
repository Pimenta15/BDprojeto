<h1 class="text-3xl font-bold mb-6"><?php echo $title; ?></h1>
<?php echo validation_errors(); ?>
<?php echo form_open('localizacoes/criar', 'class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"'); ?>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="nome_local">Nome do Local</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nome_local" type="text" name="nome_local" required>
    </div>
    <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="mensalidade">Capacidade</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="capacidade" type="number" step="0.01" name="capacidade" required>
    </div>
    <div class="flex items-center justify-between">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Adicionar local</button>
        <a href="<?php echo base_url('localizacoes'); ?>" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cancelar</a>
    </div>
</form>