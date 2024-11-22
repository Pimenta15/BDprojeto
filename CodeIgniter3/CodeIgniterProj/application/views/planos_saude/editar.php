<h1 class="text-3xl font-bold mb-6"><?php echo $title; ?></h1>
<?php echo validation_errors(); ?>
<?php echo form_open('planos-saude/editar/'.$plano_saude['id_plano'], 'class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"'); ?>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="nome_plano">Nome do Plano</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nome_plano" type="text" name="nome_plano" value="<?php echo $plano_saude['nome_plano']; ?>" required>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="corbertura">Cobertura</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="corbertura" type="text" name="corbertura" value="<?php echo $plano_saude['corbertura']; ?>" required>
    </div>
    <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="mensalidade">Mensalidade</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="mensalidade" type="number" step="0.01" name="mensalidade" value="<?php echo $plano_saude['mensalidade']; ?>" required>
    </div>
    <div class="flex items-center justify-between">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Atualizar Plano de Saúde</button>
        <a href="<?php echo base_url('planos-saude'); ?>" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cancelar</a>
    </div>
</form>