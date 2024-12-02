import requests
import pandas as pd
import plotly.express as px

# API Endpoint
url = "https://statex.ipsos.co.ug/index.php/data_api/logs_data"

# Fetch data from the API
response = requests.get(url)

# Check for a successful response
if response.status_code == 200:
    data = response.json()
    df = pd.DataFrame(data)

    # Data Preprocessing
    df['date'] = pd.to_datetime(df['date'], format='%d-%m-%Y')
    df['time'] = pd.to_datetime(df['time'], format='%H:%M:%S').dt.time

else:
    print(f"Error fetching data: {response.status_code}")

# Assuming 'region' data is available (if not, you'll need to add it manually)
fig_regions = px.pie(df, values='media', names='region', title="Radios by Region")
fig_regions.show()

# Group by month
df_monthly = df.groupby(pd.Grouper(key='date', freq='M')).size().reset_index(name='counts')

# Create the pie chart
fig_month = px.pie(df_monthly, values='counts', names=df_monthly['date'].dt.month_name(), title="Adverts My Month")
fig_month.show()