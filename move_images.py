import os
import shutil

root = r'c:\Users\YTANNU\.gemini\antigravity\scratch\meesho-b2b\public\uploads\products'
sub = os.path.join(root, 'shyam image')

if os.path.exists(sub):
    count = 0
    for f in os.listdir(sub):
        src = os.path.join(sub, f)
        dst = os.path.join(root, f)
        shutil.move(src, dst)
        count += 1
    os.rmdir(sub)
    print(f'Moved {count} files successfully!')
else:
    print('Subfolder does not exist or already moved.')
