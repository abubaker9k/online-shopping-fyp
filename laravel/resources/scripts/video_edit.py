import moviepy.config as cf
cf.IMAGEMAGICK_BINARY = r"D:\software\ImageMagick\magick.exe"

import os
from moviepy.editor import *
import moviepy.video.fx.all as vfx

video_paths = [os.environ['VIDEO1_PATH'], os.environ['VIDEO2_PATH']]
user_crop_values = tuple(map(int, os.environ['CROP_VALUES'].split(',')))
user_speed = float(os.environ['SPEED'])
user_audio_clip = os.environ['AUDIO_CLIP_PATH']
user_text = os.environ['USER_TEXT']
output_video_path = os.environ['OUTPUT_VIDEO_PATH']

crop_values = user_crop_values
speed = user_speed
audio_clip = AudioFileClip(user_audio_clip) if user_audio_clip != "" else None

clip1 = VideoFileClip(video_paths[0])
clip2 = VideoFileClip(video_paths[1])

if crop_values:
    clip1 = clip1.crop(x1=crop_values[0], y1=crop_values[1], x2=crop_values[2], y2=crop_values[3])
    clip2 = clip2.crop(x1=crop_values[0], y1=crop_values[1], x2=crop_values[2], y2=crop_values[3])

clip1 = clip1.fx(vfx.speedx, speed)
clip2 = clip2.fx(vfx.speedx, speed)

transition_duration = 1
clip1 = clip1.crossfadeout(transition_duration)
clip2 = clip2.crossfadein(transition_duration)

concatenated_video = concatenate_videoclips([clip1, clip2], method="compose")

# Add title or text to the video
title_text = user_text
title_clip = TextClip(title_text, fontsize=50, color='white')
title_clip = title_clip.set_position('center').set_duration(concatenated_video.duration)

# Overlay the title clip on the concatenated video
concatenated_video = CompositeVideoClip([concatenated_video, title_clip])

if audio_clip:
    if audio_clip.duration > concatenated_video.duration:
        audio_clip = audio_clip.subclip(0, concatenated_video.duration)
    concatenated_video = concatenated_video.set_audio(audio_clip)

final_video = concatenated_video
final_video.write_videofile(output_video_path)




#cmd working code
# import moviepy.config as cf
# cf.IMAGEMAGICK_BINARY = r"D:\software\ImageMagick\magick.exe"

# import sys
# from moviepy.editor import *
# import moviepy.video.fx.all as vfx
# import moviepy.audio.fx.all as afx

# video_paths = [os.environ['VIDEO1_PATH'], os.environ['VIDEO2_PATH']]
# user_crop_values = tuple(map(int, os.environ['CROP_VALUES'].split(',')))
# user_speed = float(os.environ['SPEED'])
# user_audio_clip = os.environ['AUDIO_CLIP_PATH']
# user_text = os.environ['USER_TEXT']

# video_paths = [sys.argv[1], sys.argv[2]]
# user_crop_values = tuple(map(int, sys.argv[3].split(',')))
# user_speed = float(sys.argv[4])
# user_audio_clip = sys.argv[5]

# crop_values = user_crop_values
# speed = user_speed
# audio_clip = AudioFileClip(user_audio_clip) if user_audio_clip != "" else None

# clip1 = VideoFileClip(video_paths[0])
# clip2 = VideoFileClip(video_paths[1])

# if crop_values:
#     clip1 = clip1.crop(x1=crop_values[0], y1=crop_values[1], x2=crop_values[2], y2=crop_values[3])
#     clip2 = clip2.crop(x1=crop_values[0], y1=crop_values[1], x2=crop_values[2], y2=crop_values[3])

# clip1 = clip1.fx(vfx.speedx, speed)
# clip2 = clip2.fx(vfx.speedx, speed)

# transition_duration = 1
# clip1 = clip1.crossfadeout(transition_duration)
# clip2 = clip2.crossfadein(transition_duration)

# concatenated_video = concatenate_videoclips([clip1, clip2], method="compose")

# # Add title or text to the video
# title_text = "Your Title Here"
# title_clip = TextClip(title_text, fontsize=50, color='white')
# title_clip = title_clip.set_position('center').set_duration(concatenated_video.duration)

# # Overlay the title clip on the concatenated video
# concatenated_video = CompositeVideoClip([concatenated_video, title_clip])

# if audio_clip:
#     if audio_clip.duration > concatenated_video.duration:
#         audio_clip = audio_clip.subclip(0, concatenated_video.duration)
#     concatenated_video = concatenated_video.set_audio(audio_clip)

# final_video = concatenated_video
# final_video.write_videofile(sys.argv[6])






#working code without text
# import sys
# from moviepy.editor import *
# import moviepy.video.fx.all as vfx

# video_paths = [sys.argv[1], sys.argv[2]]
# user_crop_values = tuple(map(int, sys.argv[3].split(',')))
# user_speed = float(sys.argv[4])
# user_audio_clip = sys.argv[5]

# crop_values = user_crop_values
# speed = user_speed
# audio_clip = AudioFileClip(user_audio_clip) if user_audio_clip != "" else None

# clip1 = VideoFileClip(video_paths[0])
# clip2 = VideoFileClip(video_paths[1])

# if crop_values:
#     clip1 = clip1.crop(x1=crop_values[0], y1=crop_values[1], x2=crop_values[2], y2=crop_values[3])
#     clip2 = clip2.crop(x1=crop_values[0], y1=crop_values[1], x2=crop_values[2], y2=crop_values[3])

# clip1 = clip1.fx(vfx.speedx, speed)
# clip2 = clip2.fx(vfx.speedx, speed)

# transition_duration = 1
# clip1 = clip1.crossfadeout(transition_duration)
# clip2 = clip2.crossfadein(transition_duration)

# concatenated_video = concatenate_videoclips([clip1, clip2], method="compose")

# if audio_clip:
#     if audio_clip.duration > concatenated_video.duration:
#         audio_clip = audio_clip.subclip(0, concatenated_video.duration)
#     concatenated_video = concatenated_video.set_audio(audio_clip)

# final_video = concatenated_video
# final_video.write_videofile(sys.argv[6])


