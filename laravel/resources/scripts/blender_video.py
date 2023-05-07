import bpy
import os

bpy.ops.wm.open_mainfile(filepath="D:\\blender\\test.blend")

bpy.ops.import_scene.obj(filepath="D:\\blender\\tent.obj")

# Remove existing materials
obj = bpy.context.selected_objects[0]
obj.data.materials.clear()

# Load the image as a texture
image_path = "D:\\blender\\texture.jpeg"
texture_image = bpy.data.images.load(image_path)
texture = bpy.data.textures.new('ImageTexture', type='IMAGE')
texture.image = texture_image

# Create a material for the object
material = bpy.data.materials.new("ObjectMaterial")
material.use_nodes = True
bsdf_node = material.node_tree.nodes["Principled BSDF"]
tex_image_node = material.node_tree.nodes.new("ShaderNodeTexImage")
tex_image_node.image = texture_image
material.node_tree.links.new(bsdf_node.inputs["Base Color"], tex_image_node.outputs["Color"])

# Assign the material to the object
obj.data.materials.append(material)

camera = bpy.data.objects['Camera']
bpy.context.scene.camera = camera

# Set up render settings
bpy.context.scene.render.image_settings.file_format = 'FFMPEG'
bpy.context.scene.render.ffmpeg.format = 'MPEG4'
bpy.context.scene.render.ffmpeg.codec = 'H264'
bpy.context.scene.render.filepath = "D:\\blender\\video.mp4"

# Set the frame range
bpy.context.scene.frame_start = 1
bpy.context.scene.frame_end = 100

# Render the animation
bpy.ops.render.render(animation=True)

bpy.ops.wm.save_mainfile(filepath="D:\\blender\\new.blend")



















# working code to make video using blender
# import bpy
# import os

# bpy.ops.wm.open_mainfile(filepath="D:\\test.blend")

# bpy.ops.import_scene.obj(filepath="D:\\tent.obj")

# camera = bpy.data.objects['Camera']
# bpy.context.scene.camera = camera

# # Set up render settings
# bpy.context.scene.render.image_settings.file_format = 'FFMPEG'
# bpy.context.scene.render.ffmpeg.format = 'MPEG4'
# bpy.context.scene.render.ffmpeg.codec = 'H264'
# bpy.context.scene.render.filepath = "D:\\video.mp4"

# # Set the frame range
# bpy.context.scene.frame_start = 1
# bpy.context.scene.frame_end = 100

# # Render the animation
# bpy.ops.render.render(animation=True)

# bpy.ops.wm.save_mainfile(filepath="D:\\new.blend")





















# successfully get 100 frames
# import bpy
# import os

# bpy.ops.wm.open_mainfile(filepath="D:\\test.blend")

# bpy.ops.import_scene.obj(filepath="D:\\tent.obj")

# camera = bpy.data.objects['Camera']
# bpy.context.scene.camera = camera

# output_path_template = "D:\\frame_{:03d}.png"

# for frame in range(1, 101):
#     bpy.context.scene.frame_set(frame)
#     output_path = output_path_template.format(frame)
#     bpy.context.scene.render.filepath = output_path
#     bpy.ops.render.render(write_still=True)
#     bpy.data.images['Render Result'].save_render(filepath=output_path)

# bpy.ops.wm.save_mainfile(filepath="D:\\new.blend")










#complete working of import obj make render and save it into another ,blend file
# import bpy
# import os

# bpy.ops.wm.open_mainfile(filepath="D:\\test.blend")

# bpy.ops.import_scene.obj(filepath="D:\\tent.obj")

# camera = bpy.data.objects['Camera']
# bpy.context.scene.camera = camera

# output_path = "D:\\rendered_image.png"
# bpy.context.scene.render.filepath = output_path

# bpy.ops.render.render(write_still=True)

# bpy.data.images['Render Result'].save_render(filepath=output_path)

# bpy.ops.wm.save_mainfile(filepath="D:\\new.blend")







