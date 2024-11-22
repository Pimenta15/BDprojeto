<h1 class="text-3xl font-bold mb-6"><?php echo $title; ?></h1>
<?php echo validation_errors(); ?>
<?php echo form_open('medicos/criar', 'class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"'); ?>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="nome">Nome</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nome" type="text" name="nome" required>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="especialidade">Especialidade</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="especialidade" type="text" name="especialidade" required>
    </div>
    <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="crm">CRM</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="crm" type="text" name="crm" required>
    </div>
    <div class="flex items-center justify-between">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Adicionar Médico</button>
        <a href="<?php echo base_url('medicos'); ?>" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cancelar</a>
    </div>
</form>