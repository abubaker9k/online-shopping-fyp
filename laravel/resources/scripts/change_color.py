# import bpy
# import sys

# # Get input arguments
# input_model = sys.argv[-3]
# output_model = sys.argv[-2]
# color_file_path = sys.argv[-1]

# # Read the RGB color values, length, and width from the file
# with open(color_file_path, 'r') as color_file:
#     r, g, b, length, width = map(float, color_file.readline().strip().split(' '))
#     rgb_color = (r, g, b)

# # Clear existing mesh objects
# bpy.ops.object.select_all(action='DESELECT')
# bpy.ops.object.select_by_type(type='MESH')
# bpy.ops.object.delete()

# # Load the 3D model
# bpy.ops.import_scene.obj(filepath=input_model)

# # Delete unnecessary objects (Light and Camera)
# bpy.ops.object.select_all(action='DESELECT')
# bpy.data.objects['Light'].select_set(True)
# bpy.data.objects['Camera'].select_set(True)
# bpy.ops.object.delete()

# # Select all mesh objects
# bpy.ops.object.select_all(action='DESELECT')
# bpy.ops.object.select_by_type(type='MESH')

# # Get the imported object
# imported_obj = bpy.context.selected_objects[0]

# # Apply the RGBA color to the model
# imported_obj.data.materials.clear()
# material = bpy.data.materials.new(name="New_Material")
# material.diffuse_color = rgb_color + (1.0,)
# imported_obj.data.materials.append(material)

# # Apply the length and width if provided, otherwise keep the original dimensions
# if length > 0:
#     imported_obj.dimensions.y = length
# if width > 0:
#     imported_obj.dimensions.x = width


# # Save the colored model
# bpy.ops.export_scene.obj(filepath=output_model)






















# D:\\software\\blender\\blender.exe --background --python D:\\codes\\online-shopping-fyp\\laravel\\resources\\scripts\\change_color.py -- D:\\mlll\\objs\\1.obj D:\\codes\\online-shopping-fyp\\laravel\\storage\\app\\public\\models\\colored_model.obj D:\\codes\\online-shopping-fyp\\laravel\\storage\\app\\temp\\color.txt

import bpy
import sys

# Get input arguments
input_model = sys.argv[-3]
output_model = sys.argv[-2]
color_file_path = sys.argv[-1]

# Read the RGB color values from the file
with open(color_file_path, 'r') as color_file:
    rgb_color = tuple(map(float, color_file.readline().strip().split(' ')))

# Clear existing mesh objects
bpy.ops.object.select_all(action='DESELECT')
bpy.ops.object.select_by_type(type='MESH')
bpy.ops.object.delete()

# Load the 3D model
bpy.ops.import_scene.obj(filepath=input_model)

# Delete unnecessary objects (Light and Camera)
bpy.ops.object.select_all(action='DESELECT')
bpy.data.objects['Light'].select_set(True)
bpy.data.objects['Camera'].select_set(True)
bpy.ops.object.delete()

# Select all mesh objects
bpy.ops.object.select_all(action='DESELECT')
bpy.ops.object.select_by_type(type='MESH')

# Get the imported object
imported_obj = bpy.context.selected_objects[0]

# Apply the RGBA color to the model
imported_obj.data.materials.clear()
material = bpy.data.materials.new(name="New_Material")
material.diffuse_color = rgb_color + (1.0,)
imported_obj.data.materials.append(material)

# Save the colored model
bpy.ops.export_scene.obj(filepath=output_model)
