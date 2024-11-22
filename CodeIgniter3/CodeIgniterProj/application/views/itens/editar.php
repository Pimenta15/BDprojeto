<h1 class="text-3xl font-bold mb-6"><?php echo $title; ?></h1>
<?php echo validation_errors(); ?>
<?php echo form_open('itens/editar/'.$item['id_item'], 'class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"'); ?>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="nome_item">Nome do Item</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nome_item" type="text" name="nome_item" value="<?php echo $item['nome_item']; ?>" required>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="corbertura">Descricao</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="descricao" type="text" name="descricao" value="<?php echo $item['descricao']; ?>" required>
    </div>
    <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="preco">Preço</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="preco" type="number" step="0.01" name="preco" value="<?php echo $item['preco']; ?>" required>
    </div>
    <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="quantidade">Quantidade</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="quantidade" type="number" step="0.01" name="quantidade" value="<?php echo $item['quantidade']; ?>" required>
    </div>
    <div class="flex items-center justify-between">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Adicionar item</button>
        <a href="<?php echo base_url('itens'); ?>" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cancelar</a>
    </div>
</form>