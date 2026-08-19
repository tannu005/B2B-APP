import os
import shutil

src_dir = r'C:\Users\YTANNU\.gemini\antigravity\scratch\shyam_images\shyam image'
dst_dir = r'c:\Users\YTANNU\.gemini\antigravity\scratch\meesho-b2b\public\uploads\products'

if not os.path.exists(dst_dir):
    os.makedirs(dst_dir)

copied = 0
for f in os.listdir(src_dir):
    src_file = os.path.join(src_dir, f)
    if os.path.isfile(src_file):
        dst_file = os.path.join(dst_dir, f)
        shutil.copy2(src_file, dst_file)
        copied += 1

print(f'Successfully copied {copied} image files to {dst_dir}.')
